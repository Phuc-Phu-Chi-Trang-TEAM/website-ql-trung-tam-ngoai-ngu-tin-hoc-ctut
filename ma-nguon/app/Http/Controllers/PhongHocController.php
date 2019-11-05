<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhongHocModel;

class PhongHocController extends Controller
{
    protected function layDanhSachPhongHoc(){
        $ds_phong_hoc = PhongHocModel::all();
        return view ('quan-ly-phong-hoc',['ds_phong_hoc'=>$ds_phong_hoc]);
    }

    protected function batSuKienClickButton(Request $request){
        if ($request->btn_them){
            $this->themPhongHoc($request);
            return redirect('quan-ly-phong-hoc')->with('thongbao','Thêm thành công');
        }
        if ($request->btn_luu){
            $this->capNhatThongTinPhongHoc($request);
            return redirect('quan-ly-phong-hoc')->with('thongbao','Cập nhật thông tin phòng học thành công');
        }
        if ($request->btn_xoa){
            $this->xoaPhongHoc($request);
            return redirect('quan-ly-phong-hoc')->with('thongbao','Xóa thành công');
        }
        if ($request->btn_huy){
            return redirect('quan-ly-phong-hoc')->with('thongbao','Đã hủy thao tác');
        }
    }

    protected function themPhongHoc($request){
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
    
    protected function layThongTinPhongHoc($id){
        $thong_tin_phong_hoc = PhongHocModel::where('Ma_phong_hoc',$id)->get();
        $ds_phong_hoc = PhongHocModel::all();
        return view ('quan-ly-phong-hoc',['ds_phong_hoc'=>$ds_phong_hoc,'thong_tin_phong_hoc'=>$thong_tin_phong_hoc]);
    }

    protected function layThongTinPhongHocCanXoa($id){
        $thong_tin_phong_hoc_xoa = PhongHocModel::where('Ma_phong_hoc',$id)->get();
        $ds_phong_hoc = PhongHocModel::all();
        return view ('quan-ly-phong-hoc',['ds_phong_hoc'=>$ds_phong_hoc,'thong_tin_phong_hoc_xoa'=>$thong_tin_phong_hoc_xoa]);
    }

    protected function capNhatThongTinPhongHoc($request){
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

    protected function xoaPhongHoc($request){
        $phong_hoc=PhongHocModel::where('Ma_phong_hoc','=',$request->ma_phong_hoc)->first();
        $phong_hoc->delete();
    }
}