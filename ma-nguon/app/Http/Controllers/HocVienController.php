<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HocVienModel;

class HocVienController extends Controller
{
    public function layDanhSachHocVien(){
        $ds_hoc_vien = HocVienModel::all();
        return view ('dang-ky-hoc-vien',['ds_hoc_vien'=>$ds_hoc_vien]);
    }
}
