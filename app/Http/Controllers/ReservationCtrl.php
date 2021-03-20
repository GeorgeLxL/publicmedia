<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ReservationCtrl extends Controller
{
    public function complete(Request $req)
    {
        $data = $req->all();
   
        if($data['status']=='true')
        {
            DB::update("update reservations set reservation_status = 2 where id = ?",[$data['reservation_id']]);
        }
        if($data['status']=='false')
        {
            DB::update("update reservations set reservation_status = 1 where id = ?",[$data['reservation_id']]);
        }
    }

  
}
