<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StylistCtrl extends Controller
{
    //update 12:19
    public function home(Request $req)
    {
        if ($req->session()->get('role')!="stylist"){
            return redirect('/');
        }
        $useremail = $req->session()->get('email');
        $data = DB::select("SELECT shop.name, main_image, atmosphere1,
        atmosphere2, atmosphere3, telephone, address, opentime, closetime,
        gatheringtime, holiday, fee, seatnum, parkinglot, routestation, access,
        card, commitment, area.name AS area, area.parent_id as prov, area.id as county
        FROM shop INNER JOIN stylist ON shop.id=stylist.shop
        AND stylist.email = ? INNER JOIN AREA ON area.id= stylist.shoparea ", [$useremail]);
        if(count($data)>0) $shopdata = $data[0];
        return view('hairdresser.home', compact('shopdata'));
    }

    public function menu(Request $req)
    {
        
        if ($req->session()->get('role')!="stylist"){
            return redirect('/');
        }
        $menu_groups = DB::select("select name, id from menugroup where user_id =
         (select id from stylist where email = ?) ORDER BY id", [$req->session()->get('email')]);
        $menus= array();
        $i=0;
        foreach($menu_groups as $menu_group)
        {
            foreach($menu_group as $key=>$value){
                if($key == 'name'){
                    $menu = DB::select("select * from menu where menugroupname = ? and user_id =
                     (select id from stylist where email = ?)", [$value, $req->session()->get('email')]);
                    array_push($menus,$menu);
                    $i++;
                }
            }            
        }
        $returnval=array("menu_groups"=>$menu_groups, "menus"=>$menus);
        return view('hairdresser.menu', compact('returnval'));
    }

    // public function member(Request $req)
    // {
    //     $useremail = $req->session()->get('email');
    //     $data = DB::select("SELECT * FROM shop INNER JOIN stylist ON shop.id = stylist.shop AND stylist.email = ?", [$useremail]);
    //     $shopdata = $data[0];
    //     return view('hairdresser.member', compact('shopdata'));

    // }

    public function reserve(Request $req,$id)
    {
        if ($req->session()->get('role')!="stylist"){
            return redirect('/');
        }
        $useremail = $req->session()->get('email');
        $checkData = DB::select("SELECT id,  first_choice_date, second_choice_date, third_choice_date FROM reservations WHERE reservation_status = 1");
        foreach($checkData as $checkreservation)
        {
            $booked = false;
            foreach($checkreservation as $key=>$value)
            {
                if($key!="id" && $value!=null)
                {
                    $year = substr($value,0,4);
                    $month = substr($value, 7,2);
                    $date = substr($value,12,2);
                    $time = substr($value,-5);
                    $d=strtotime($year."/".$month."/".$date.",".$time);
                    date_default_timezone_set('Asia/Tokyo');
                    $currenttime = strtotime(date('m/d/Y h:i:s a', time()));
                    if($d>$currenttime)
                    {
                        $booked = true;
                    }

                }
            }
            if($booked==false)
            {
                DB::update("update reservations set reservation_status = 3 where id = ?",[$checkreservation->id]);
            }
        }
        if($id==0)
        {
            $returnData = DB::select("SELECT users.name_kana,
            reservations.id as id,menu_ids, first_choice_date, second_choice_date,
            third_choice_date, total_amount, reservation_status
            FROM reservations INNER JOIN users ON users.id = reservations.customer_id
            WHERE hairdresser_id = (SELECT id FROM stylist WHERE email = ?)", [$useremail]);
        }
        else
        {
            $returnData = DB::select("SELECT users.name_kana,
            reservations.id as id,menu_ids, first_choice_date, second_choice_date,
            third_choice_date, total_amount, reservation_status
            FROM reservations INNER JOIN users ON users.id = reservations.customer_id
            WHERE reservation_status = ? and hairdresser_id = (SELECT id FROM stylist WHERE email = ?)", [$id,$useremail]);
        }
        foreach ($returnData as $reservation)
        {
            foreach($reservation as $key=>$value)
            {
                $menu_names="";
                if($key=="menu_ids")
                {
                    $menu_ids = explode(",", $value);
                    foreach($menu_ids as $menu)
                    {
                        $menu_name = DB::select("select name from menu where id = ?", [$menu]);
                        if(count($menu_name)>0)
                            $menu_names.=$menu_name[0]->name." ";
                    }
                    $reservation->menu_ids = $menu_names;
                }
               
            }
        }
        $selectedval = $id;
        return view('hairdresser.reservation', compact('returnData','selectedval'));
        
    }
    public function upload($file)
    {
        $name =uniqid().".".$file->getClientOriginalExtension();
        $file->move(public_path().'/uploads/', $name);
        return 'uploads/'. $name;
        
    }
    //update 12:19
    public function saveshopdata(Request $req)
    {
        if ($req->session()->get('role')!="stylist"){
            return redirect('/');
        }
        $shopdata = $req->all();
        $data = DB::update("update shop set name = ?, telephone = ?, address = ?,
         opentime = ?, closetime = ?, gatheringtime = ?, holiday = ?, fee = ?,
          seatnum = ?, parkinglot = ?, routestation = ?, access = ?,  card = ?, commitment = ?
        where id = (select shop from stylist where email = ?)",
        [$shopdata['name'], $shopdata['telephone'], $shopdata['address'], $shopdata['opentime'], $shopdata['closetime'], $shopdata['gatheringtime'], $shopdata['holiday'], $shopdata['fee'], $shopdata['seatnum'], $shopdata['parkinglot'], $shopdata['routestation'], $shopdata['access'],  $shopdata['card'], $shopdata['commitment'], $req->session()->get('email')]);
        $data = DB::update("update stylist set shoparea = ? where email = ?", [$shopdata['county'],$req->session()->get('email')]);
        if($req->hasFile('main_image')) {
            $file = $req->file('main_image');
            $filepath = $this->upload($file);
            DB::update("update shop set main_image = ?  where id = (select shop from stylist where email = ?)",[$filepath, $req->session()->get('email')]);
        }
        if($req->hasFile('atmosphere1')) {
            $file = $req->file('atmosphere1');
            $filepath = $this->upload($file);
            DB::update("update shop set atmosphere1 = ?  where id = (select shop from stylist where email = ?)",[$filepath, $req->session()->get('email')]);
        } 
        if($req->hasFile('atmosphere2')) {
            $file = $req->file('atmosphere2');
            $filepath = $this->upload($file);
            DB::update("update shop set atmosphere2 = ?  where id = (select shop from stylist where email = ?)",[$filepath, $req->session()->get('email')]);
        } 
        if($req->hasFile('atmosphere3')) {
            $file = $req->file('atmosphere3');
            $filepath = $this->upload($file);
            DB::update("update shop set atmosphere3 = ?  where id = (select shop from stylist where email = ?)",[$filepath, $req->session()->get('email')]);
        }       
        echo "true";
    }

    public function mypage(Request $req)
    {
        if ($req->session()->get('role')!="stylist"){
            return redirect('/');
        }
        $photos = DB::select("select * from images where user_id = (select id from stylist where email = ?)", [$req->session()->get('email')]);
        return view('hairdresser.mypage', compact('photos'));
    }

    public function uploadphoto(Request $req)
    {
        if ($req->session()->get('role')!="stylist"){
            return redirect('/');
        }
        $userid = DB::select("select id, shoparea from stylist where email = ?", [$req->session()->get('email')]);
        $data = $req->all();
        if($req->hasFile('image')) {
            $file = $req->file('image');
            $filepath = $this->upload($file);
            DB::insert('INSERT INTO images(image, user_id, hairtype, area) VALUES(?,?,?,?)', [$filepath,$userid[0]->id, $data['hairtype'], $userid[0]->shoparea]);
        }
        echo "true";
    }
    
    
}