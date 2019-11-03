<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiangDayController extends Controller
{
    public function layDanhSachGiangDay(){
        $ds_buoi_hoc = GiangDayModel::all();
        return view ('phan-cong-giang-day',['ds_giang_day'=>$ds_giang_day]);
    }
}
