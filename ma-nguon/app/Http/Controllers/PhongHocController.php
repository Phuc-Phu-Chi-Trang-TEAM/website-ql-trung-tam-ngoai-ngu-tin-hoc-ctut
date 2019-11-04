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

    public function batSuKienClickButton(Request $request){
        if ($request->btn_them){
            $this->themPhongHoc($request);
            return redirect('quan-ly-phong-hoc')->with('thongbao','Thêm thành công');
        }
        if ($request->btn_luu){
            $this->capNhatThongTinPhongHoc($request);
            return redirect('quan-ly-phong-hoc')->with('thongbao','Cập nhật thông tin phòng học thành công');
        }
    }

    public function themPhongHoc($request){
        $this->validate(
            $request,
            ['ten_phong_hoc'=>'required'],
            ['ten_phong_hoc.required'=>"Bạn chưa nhập tên phòng học"]
        );

        $phong_hoc = new PhongHocModel;
        $phong_hoc->ten_phong_hoc = $request->ten_phong_hoc;
        $phong_hoc->ghi_chu = $request->ghi_chu;
        $phong_hoc->save();
    }
    
    public function layThongTinPhongHoc($id){
        $thong_tin_phong_hoc = PhongHocModel::where('Ma_phong_hoc',$id)->get();
        $ds_phong_hoc = PhongHocModel::all();
        return view ('quan-ly-phong-hoc',['ds_phong_hoc'=>$ds_phong_hoc,'thong_tin_phong_hoc'=>$thong_tin_phong_hoc]);
    }

    public function capNhatThongTinPhongHoc($request){
        $this->validate(
            $request,
            ['ten_phong_hoc'=>'required'],
            ['ten_phong_hoc.required'=>"Bạn chưa nhập tên phòng học"]
        );

        $phong_hoc=PhongHocModel::where('Ma_phong_hoc','=',$request->ma_phong_hoc)->first();
        $phong_hoc->ten_phong_hoc = $request->ten_phong_hoc;
        $phong_hoc->ghi_chu = $request->ghi_chu;
        $phong_hoc->save();
    }
}