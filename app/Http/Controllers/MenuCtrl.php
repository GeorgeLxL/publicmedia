<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuCtrl extends Controller
{
    public function menu_groups_edit(Request $req)
    {
        $menu_group = DB::select("select name from menugroup where user_id = (select id from stylist where email = ?)", [$req->session()->get('email')]); 
        return view('hairdresser.menu_groups_edit', compact('menu_group'));
    }

    public function menu_groups_save(Request $req)
    {
        $userid = DB::select("select id from stylist where email = ?", [$req->session()->get('email')]); 
        DB::delete("delete from menugroup where user_id = ?", [$userid[0]->id]);
        $menu_groups = $req->all();
        foreach($menu_groups as $key=> $value)
        {
            if($key!="_token"){
                DB::insert('INSERT INTO menugroup(name,user_id) VALUES(?,?)', [$value, $userid[0]->id]);
            }
        }
        return "true";  
    }

    public function menu_edit(Request $req, $menugroupname){
        $menus = DB::select("select * from menu where menugroupname = ? and user_id = (select id from stylist where email = ?)", [$menugroupname,  $req->session()->get('email')]);
        $returndata= array("menugroupname" => $menugroupname, "menus"=>$menus);
        return view('hairdresser.menu_edit', compact('returndata'));
    }

    public function menu_save(Request $req, $menugroupname){
        $userid = DB::select("select id from stylist where email = ?", [$req->session()->get('email')]); 
        DB::delete("delete from menu where user_id = ? and menugroupname = ?", [$userid[0]->id, $menugroupname]);
        $menus = $req->all();
        $name = array();
        $amount = array();
        $explanation = array();
        $requiretime = array();
        foreach($menus as $key=> $value)
        {
            if(strpos($key, 'name') !== false)
            array_push($name,$value);
            if(strpos($key, 'amount') !== false)
            array_push($amount,$value);
            if(strpos($key, 'explanation') !== false)
            array_push($explanation,$value);
            if(strpos($key, 'requiretime') !== false)
            array_push($requiretime,$value);
            
        }

        for($i=0; $i<count($name); $i++)
        {
            DB::insert('INSERT INTO menu(name,amount, explanation, requiretime, menugroupname, user_id) VALUES(?,?,?,?,?,?)', [$name[$i], $amount[$i],$explanation[$i],$requiretime[$i],$menugroupname,$userid[0]->id]);
        }

        return "true";
    }
}
