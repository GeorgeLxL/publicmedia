<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
class SearchCtrl extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Tokyo');
    }

    public function index()
    {
        return searchview();
    }

    public function searchview()
    {
        $hair_style_list = DB::table('hairstyle')->get();
        $area_list = DB::table('area')->whereNull('parent_id')->get();
        return view('search_page', compact('hair_style_list', 'area_list'));
    }

    public function getSubAreaList(Request $request) {
        $parent_id = (int)$request->input('parent_id');
        $sub_area_list = DB::table('area')->where('parent_id', $parent_id)->get();
        return response()->json($sub_area_list);
    }

    public function getSearchResult(Request $request) {
        $search_area_list = explode(",", $request->input('selected_areas'));
        $hair_style = null;
        $areas_name_list = array();
        if($request->input('selected_hair_style') != '') {
            $hair_style = DB::table('hairstyle')->where('id', (int)trim($request->input('selected_hair_style')))->first();
        }
        if($request->input('selected_areas') != '') {
            $areas_name_list = DB::table('area')->select('name')->whereIn('id', $search_area_list)->get();
        }
        $search_info = array('hair_style' => $hair_style, 'areas_name_list' => $areas_name_list);
        
        $search_result_list = DB::table('images')
                        ->leftJoin('favorites', 'favorites.image_id', '=', 'images.id')
                        ->where('hairtype', trim($request->input('selected_hair_style')))
                        ->whereIn('area', $search_area_list)
                        ->get();
        return view('search_result_page', compact('search_result_list', 'search_info'));
    }

    public function getHairStyleDetail($image_id) {
        $image_infomation = DB::table('images')
                        ->select('images.*', 'favorites.*', 'area.name')
                        ->leftJoin('favorites', 'favorites.image_id', '=', 'images.id')
                        ->leftJoin('area', 'images.area', '=', 'area.id')
                        ->where('images.id', (int)$image_id)->first();
        $hairdresser_information = DB::table('stylist')
                        ->leftJoin('shop', 'stylist.id', '=', 'shop.user_id')
                        ->where('stylist.id', $image_infomation->user_id)
                        ->first();
        $related_images_list = DB::table('images')
                        ->leftJoin('favorites', 'favorites.image_id', '=', 'images.id')
                        ->where('user_id', $image_infomation->user_id)
                        ->where('images.id', '!=', (int)$image_id)
                        ->get();
        return view('hair_style_detail_page', compact('image_infomation', 'hairdresser_information', 'related_images_list'));
    }

    public function reservation(Request $request) {
        $hairdresser_id = (int)trim($request->input('id'));
        
        if($hairdresser_id && is_numeric($hairdresser_id)) {
            $menu_list = DB::table('menu')->where('user_id', $hairdresser_id)->get();
            $hairdresser_information = DB::table('stylist')
                        ->leftJoin('shop', 'stylist.id', '=', 'shop.user_id')
                        ->where('stylist.id', $hairdresser_id)
                        ->first();
            Session::put('hairdresser_information', $hairdresser_information);
            return view('reservation_step_one_page', compact('menu_list', 'hairdresser_information', 'hairdresser_id'));
        }
        return redirect('/');
    }
    public function reservationStepOne(Request $request) {
        $selected_menu_ids = explode(",", trim($request->input('selected_menus')));
        $hairdresser_id = (int)trim($request->input('hairdresser_id'));
       
        if(!Session::get('hairdresser_information')) {
            return redirect('/');
        }
        if($request->input('selected_menus') && $request->input('hairdresser_id')) {
            $hairdresser_information = Session::get('hairdresser_information');
            $selected_menu_list = DB::table('menu')
                        ->whereIn('id', $selected_menu_ids)
                        ->get();
            Session::put('selected_menu_list', $selected_menu_list);
            return view('reservation_step_two_page', compact('hairdresser_information'));
        }
        return redirect('/');
    }

    public function reservationStepTwo(Request $request) {
        if(!Session::get('hairdresser_information') && !Session::get('selected_menu_list')) {
            return redirect('/');
        }
        if($request->input('selected_days') && $request->input('message')) {
            $seleted_days_list = json_decode($request->input('selected_days'), true);
            $message = trim($request->input('message'));
            $hairdresser_information = Session::get('hairdresser_information');
            $selected_menu_list = Session::get('selected_menu_list');
            Session::put('seleted_days_list', $seleted_days_list);
            Session::put('leave_message', $message);
            return view('reservation_step_three_page', compact('hairdresser_information', 'selected_menu_list', 'seleted_days_list', 'message'));
        }
        return redirect('/');
        
    }
    public function reservationStepTwoGet() {
        if(!Session::get('hairdresser_information') && !Session::get('selected_menu_list') && !Session::get('seleted_days_list') && !Session::get('leave_message')) {
            return redirect('/');
        }
        $seleted_days_list = Session::get('seleted_days_list');
        $message = Session::get('leave_message');
        $hairdresser_information = Session::get('hairdresser_information');
        $selected_menu_list = Session::get('selected_menu_list');
        return view('reservation_step_three_page', compact('hairdresser_information', 'selected_menu_list', 'seleted_days_list', 'message'));
    }

    public function completeReservation(Request $request) {
        if(!Session::get('hairdresser_information') && !Session::get('selected_menu_list') && !Session::get('seleted_days_list')) {
            return redirect('/');
        }
        if($request->input('reservation_complete_confirm') && trim($request->input('reservation_complete_confirm')) == 'true') {
            $hairdresser_information = Session::get('hairdresser_information');
            $selected_menu_list = Session::get('selected_menu_list');
            $seleted_days_list = Session::get('seleted_days_list');
            $leave_message = Session::get('leave_message');
            $total_amount = 0;
            $menu_ids = '';
            foreach($selected_menu_list as $menu_item) {
                $total_amount += (int)$menu_item->amount;
                $menu_ids .= $menu_item->id.'_';
            }
            $menu_ids = substr($menu_ids, 0, strlen($menu_ids) - 1);
            // var_export($hairdresser_information); exit;
            $insert_array = [
                'customer_id' => 1, //Auth::user()->id
                'hairdresser_id' => $hairdresser_information->user_id,
                'menu_ids' => $menu_ids, 
                'remarks' => $leave_message, 
                'total_amount' => $total_amount,  
                'reservation_status' => 1, 
            ];
            $count = 0;
            foreach($seleted_days_list as $day_item) {
                if($count == 0) {
                    $insert_array['first_choice_date'] = $day_item;
                } elseif($count == 1) {
                    $insert_array['second_choice_date'] = $day_item;
                } elseif($count == 2) {
                    $insert_array['third_choice_date'] = $day_item;
                }
                $count ++;
            }
            $result = DB::table('reservations')->insert($insert_array);
            if($result) {
                Session::forget('hairdresser_information', 'selected_menu_list', 'seleted_days_list', 'leave_message');
                return response()->json(array('success' => 'true'));
            }
            return response()->json(array('success' => 'false'));
        }
        return redirect('/');
    }

    public function favoriteActive(Request $request) {
        if($request->input('image_id')) {
            $result = DB::table('favorites')->insert([
                'customer_id' => Auth::user()->id, 
                'image_id' => (int)trim($request->input('image_id')),
                'status' => 1
            ]);
            if($result) {
                return response()->json(array('success' => 'true'));
            }
            return response()->json(array('success' => 'false'));
        }
        return redirect('/');
    }

    public function MyFavoritePage() {
        if (Auth::user()) { 
            $favorite_list = DB::table('favorites')
                    ->leftJoin('images', 'favorites.image_id', '=', 'images.id')
                    ->where('customer_id', Auth::user()->id)
                    ->get();
            return view('my_favorite_page', compact('favorite_list'));
        }
        return redirect('/');
    }

    public function favoriteRemove(Request $request) {
        if($request->input('favorite_id')) {
            $result = DB::table('favorites')
                    ->where('favorite_id', (int)trim($request->input('favorite_id')))
                    ->delete();
            if($result) {
                return response()->json(array('success' => 'true'));
            }
            return response()->json(array('success' => 'false'));
        }
        return redirect('/');
    }
}
