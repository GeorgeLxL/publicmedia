<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IntroCtrl extends Controller
{
    public function introedit(Request $req)
    {
        if ($req->session()->get('role')!="admin"){
            return redirect('/');
        }
        else 
        {
            $introData = DB::select("select * from intro");
            $galleryData = DB::select("select * from gallery");
            $guideData = DB::select("select * from guide");
            $returnData = array("introData"=>$introData, "galleryData"=>$galleryData, "guideData"=>$guideData);
            return view("hairdresser.introedit",compact('returnData'));
        }


    }
    public function index()
    {
        $introData = DB::select("select * from intro");
        $galleryData = DB::select("select * from gallery");
        $guideData = DB::select("select * from guide");
        $returnData = array("introData"=>$introData, "galleryData"=>$galleryData, "guideData"=>$guideData);
        return view('home',compact('returnData'));
    }

    public function deletegallery(Request $req)
    {
        $id = $req->all()['gallery_id'];
        DB::delete("delete from gallery where id = ?", [$id]);
        $returnData =DB::select("select * from gallery");
        echo json_encode($returnData);
    }

    public function savegallery(Request $req)
    {
        if($req->hasFile('gallery_file')) {
            $file = $req->file('gallery_file');
            $filepath = $this->upload($file);
            DB::insert("INSERT INTO gallery(url) VALUES(?)", [$filepath]);
        }
        $returnData =DB::select("select * from gallery");
        echo json_encode($returnData);
    }

    public function upload($file)
    {
        $name =uniqid().".".$file->getClientOriginalExtension();
        $file->move(public_path().'/uploads/gallery/', $name);
        return 'uploads/gallery/'. $name;        
    }

    public function saveintro(Request $req)
    {
        if($req->hasFile('top_image')) {
            $file = $req->file('top_image');
            $file->move(public_path().'/uploads/intro/', "intro-bg.jpg");
        }
        $title = array();
        $content = array();
        $introdata = $req->all();
        DB::delete("delete from guide");
        foreach($introdata as $key=> $value)
        {
            if($key=="_token"){

            }
            else if($key=="intorducing")
            {
                DB::update("UPDATE intro SET advertise = ?", [$value]);
            }
            else
            {               
                if(strpos($key, 'title') !== false)
                array_push($title,$value);
                if(strpos($key, 'content') !== false)
                array_push($content,$value);
            }
        }

        for($i=0; $i<count($title); $i++)
        {
            DB::insert('INSERT INTO guide(title,content) VALUES(?,?)', [$title[$i], $content[$i]]);
        } 
        return redirect('/superadmin');
        
    }
}
