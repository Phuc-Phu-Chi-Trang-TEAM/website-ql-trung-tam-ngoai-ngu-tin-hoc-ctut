<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LopHocController extends Controller
{
    public function layDanhSachLopHoc(){
        $ds_lop_hoc = LopHocModel::all();
        return view ('quan-ly-lop-hoc',['ds_lop_hoc'=>$ds_lop_hoc]);
    }
}
