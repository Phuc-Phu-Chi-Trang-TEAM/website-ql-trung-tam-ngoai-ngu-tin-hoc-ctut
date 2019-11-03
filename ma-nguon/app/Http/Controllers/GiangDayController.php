<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiangDayModel;

class GiangDayController extends Controller
{
    public function layDanhSachGiangDay(){
        $ds_giang_day = GiangDayModel::all();
        return view ('phan-cong-giang-day',['ds_giang_day'=>$ds_giang_day]);
    }
}
