<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChamCongController extends Controller
{
    public function layDanhSachChamCong(){
        $ds_cham_cong = ChamCongModel::all();
        return view ('quan-ly-cham-cong',['ds_cham_cong'=>$ds_cham_cong]);
    }
}
