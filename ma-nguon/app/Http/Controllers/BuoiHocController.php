<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BuoiHocModel;

class BuoiHocController extends Controller
{
    public function layDanhSachBuoiHoc(){
        $ds_buoi_hoc = BuoiHocModel::all();
        return view ('quan-ly-buoi-hoc',['ds_buoi_hoc'=>$ds_buoi_hoc]);
    }
}
