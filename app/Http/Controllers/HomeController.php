<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $introData = DB::select("select * from intro");
        $galleryData = DB::select("select * from gallery");
        $guideData = DB::select("select * from guide");
        $returnData = array("introData"=>$introData, "galleryData"=>$galleryData, "guideData"=>$guideData);
        return view('home',compact('returnData'));
    }
}
