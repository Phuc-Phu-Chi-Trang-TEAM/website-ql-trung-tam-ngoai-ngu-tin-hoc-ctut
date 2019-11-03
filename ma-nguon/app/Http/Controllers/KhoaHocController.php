<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhoaHocModel;

class KhoaHocController extends Controller
{
    public function layDanhSachKhoaHoc(){
        $ds_khoa_hoc = KhoaHocModel::all();
        return view ('quan-ly-khoa-hoc',['ds_khoa_hoc'=>$ds_khoa_hoc]);
    }
}
