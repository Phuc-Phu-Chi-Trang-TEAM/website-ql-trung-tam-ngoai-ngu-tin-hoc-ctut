<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiaoVienController extends Controller
{
    public function layDanhSachGiaoVien(){
        $ds_giao_vien = GiaoVienModel::all();
        return view ('quan-ly-giao-vien',['ds_giao_vien'=>$ds_giao_vien]);
    }
}
