<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChungChiModel;

class ChungChiController extends Controller
{
    public function layDanhSachChungChi(){
        $ds_chung_chi = ChungChiModel::all();
        return view ('quan-ly-chung-chi',['ds_chung_chi'=>$ds_chung_chi]);
    }
}
