<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class NguoiDungController extends Controller
{
    public function layDanhSachNguoiDung(){
        $ds_nguoi_dung = User::all();
        return view ('quan-ly-nguoi-dung',['ds_nguoi_dung'=>$ds_nguoi_dung]);
    }
}
