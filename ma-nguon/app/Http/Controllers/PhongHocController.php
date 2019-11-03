<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhongHocModel;

class PhongHocController extends Controller
{
    public function layDanhSachPhongHoc(){
        $ds_phong_hoc = PhongHocModel::all();
        return view ('quan-ly-phong-hoc',['ds_phong_hoc'=>$ds_phong_hoc]);
    }
}