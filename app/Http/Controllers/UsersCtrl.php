<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersCtrl extends Controller
{
    public function check(Request $req)
    {
        $userdata = $req->all();
        $returndata = "";
        $data = DB::select('select * from stylist where email = ? and password = md5(?)', [$userdata['email'], $userdata['password']]);
        
        if(count($data)>0){
            if($userdata['email']=="super@admin.com"){
                $req->session()->put('email', $userdata['email']);
                $req->session()->put('userpwd', $userdata['password']);	
                $req->session()->put('role', "admin");
                $returndata = "admin";    
            }
            else{
                $req->session()->put('email', $userdata['email']);
                $req->session()->put('userpwd', $userdata['password']);	
                $req->session()->put('role', "stylist");
                $returndata = "true";
            }
        }
        else{
            $returndata = "パスワードが正しくありません";
        }        
        echo $returndata;        
    }
    
    public function register(Request $req)
    {
        $userdata = $req->all();
        $returndata = "";
        $data = DB::select('select * from stylist where email = ?', [$userdata['email']]);

        if (count($data) > 0) {
            $returndata = "すでにそのような識別子のユーザーが存在します";
        }
        else{
            $now = date("y-m-d");
            $shopid = null;
            $shop = DB::select("select id from shop where name = ? and area = ?", [$userdata['shopname'], $userdata['shoparea']]);
            if(count($shop)>0)
            {
                $shopid = $shop[0]->id;
            }
            else
            {
                DB::insert('INSERT INTO shop(name,area) VALUES(?,?)', [$userdata['shopname'], $userdata['shoparea']]);
                $shop = DB::select("select id from shop where name = ? and area = ?", [$userdata['shopname'], $userdata['shoparea']]);
                $shopid = $shop[0]->id;
            }
           
            DB::insert('INSERT INTO stylist(name_m, name_s,  email, password, shop, shoparea,company,regdate) VALUES(?,?,?,md5(?),?,?,?,?)',
            [$userdata['name_m'],$userdata['name_s'], $userdata['email'], $userdata['password'], $shopid, $userdata['shoparea'], $userdata['company'],$now]);
            DB::update('UPDATE shop set user_id = (select id from stylist where email = ?) where id = ?',[$userdata['email'], $shopid ]);
            $req->session()->put('email', $userdata['email']);
            $req->session()->put('userpwd', $userdata['password']);
            $req->session()->put('role', "stylist");
            $returndata = "true";
        }
        echo $returndata;
    }

    public function resetpassword(Request $req)
    {
        $password = $req->all();
        DB::update('update stylist set password = md5(?) where email = ?',[$password['password'], $req->session()->get('email')]);
        $req->session()->put('userpwd',$password['password']);
        echo "true";
    }

    public function account(Request $req)
    {
        $profiledata = DB::select("SELECT stylist.user_id as username, stylist.name_s as name,
         stylist.email as email, stylist.profile_photo as photo, stylist.message as message, 
         stylist.message_booker as message_booker, stylist.message_completed as message_completed,
        stylist.nomination_fee as fee, stylist.feature as feature, stylist.company as employ_status,
        stylist.official_campaign as campaign FROM stylist 
        WHERE stylist.email = ?", [$req->session()->get('email')]);
        $userdata = $profiledata[0];        
        return view("hairdresser.userinfo", compact('userdata'));
    }

    public function edit_account(Request $req)
    {
        $profiledata = DB::select("SELECT stylist.user_id as username, stylist.name_s as name,
         stylist.email as email, stylist.profile_photo as photo, stylist.message as message, 
         stylist.message_booker as message_booker, stylist.message_completed as message_completed,
        stylist.nomination_fee as fee, stylist.feature as feature, stylist.company as employ_status,
        stylist.official_campaign as campaign FROM stylist 
        WHERE stylist.email = ?", [$req->session()->get('email')]);
        $userdata = $profiledata[0];        
        return view("hairdresser.edit_account", compact('userdata'));
    }
    
    public function save_account(Request $req)
    {
        $userdata = $req->all();
        $data = DB::update("update stylist set user_id = ?, name_s = ?, email = ?,
         company = ?, message = ?, message_booker = ?, message_completed = ?,
          nomination_fee = ?, feature = ?, official_campaign = ? where email = ?",
          [$userdata['user_id'], $userdata['name'], $userdata['email'], 
          $userdata['eployment_status'], $userdata['message'], $userdata['message_booker'],
          $userdata['message_completed'], $userdata['nomination_fee'], $userdata['features'],
          isset($userdata['campaign']), $req->session()->get('email')]);
          $req->session()->put('email',$userdata['email']);

        if($req->hasFile('profile_photo')) {
            $file = $req->file('profile_photo');
            $filepath = $this->upload($file);
            DB::update("update stylist set profile_photo = ? where email = ?", [$filepath, $userdata['email']]);
        }
        echo "true";      
    }

    //create 12:19
    public function registerview()
    {
        $areadata = DB::select('SELECT name, id FROM area WHERE parent_id IS NULL');
        return view('hairdresser.registerstep', compact('areadata'));
    }

    //create 12:19
    public function getsubarea(Request $req)
    {
        $areadata = $req->all();
        $areadata_id = $areadata['areaid'];
        $returndata = DB::select("SELECT name, id FROM area WHERE parent_id = ?",[$areadata_id]);
        echo json_encode($returndata);
    }
    //create 12:19
    public function getarea(Request $req)
    {
        $returndata = DB::select("SELECT name, id FROM area WHERE parent_id IS NULL");
        echo json_encode($returndata);
    }

    public function upload($file)
    {
        $name =uniqid().".".$file->getClientOriginalExtension();
        $file->move(public_path().'/uploads/avatar/', $name);
        return 'uploads/avatar/'. $name;
        
    }

}
