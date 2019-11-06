<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LopHocModel;

class LopHocController extends Controller
{
    protected function layDanhSachLopHoc(){
        $ds_lop_hoc = LopHocModel::all();
        return view ('quan-ly-lop-hoc',['ds_lop_hoc'=>$ds_lop_hoc]);
    }

    protected function batSuKienClickButton(Request $request){
        if ($request->btn_them){
            $this->themLopHoc($request);
            return redirect('quan-ly-lop-hoc')->with('thongbao','Thêm thành công');
        }
        if ($request->btn_luu){
            $this->capNhatThongTinLopHoc($request);
            return redirect('quan-ly-lop-hoc')->with('thongbao','Cập nhật thông tin lớp học thành công');
        }
        if ($request->btn_xoa){
            $this->xoaLopHoc($request);
            return redirect('quan-ly-lop-hoc')->with('thongbao','Xóa thành công');
        }
        if ($request->btn_huy){
            return redirect('quan-ly-lop-hoc')->with('thongbao','Đã hủy thao tác');
        }
    }

    protected function themLopHoc($request){
        $this->validate(
            $request,
            ['ten_lop_hoc'=>'required'],
            ['ten_lop_hoc.required'=>"Bạn chưa nhập tên lớp học"]
        );

        $lop_hoc = new LopHocModel;
        $lop_hoc->ten_lop_hoc = $request->ten_lop_hoc;
        $lop_hoc->ghi_chu = $request->ghi_chu;
        $lop_hoc->save();
    }
    
    protected function layThongTinLopHoc($id){
        $thong_tin_lop_hoc = LopHocModel::where('Ma_lop_hoc',$id)->get();
        $ds_lop_hoc = LopHocModel::all();
        return view ('quan-ly-lop-hoc',['ds_lop_hoc'=>$ds_lop_hoc,'thong_tin_lop_hoc'=>$thong_tin_lop_hoc]);
    }

    protected function layThongTinLopHocCanXoa($id){
        $thong_tin_lop_hoc_xoa = LopHocModel::where('Ma_lop_hoc',$id)->get();
        $ds_lop_hoc = LopHocModel::all();
        return view ('quan-ly-lop-hoc',['ds_lop_hoc'=>$ds_lop_hoc,'thong_tin_lop_hoc_xoa'=>$thong_tin_lop_hoc_xoa]);
    }

    protected function capNhatThongTinLopHoc($request){
        $this->validate(
            $request,
            ['ten_lop_hoc'=>'required'],
            ['ten_lop_hoc.required'=>"Bạn chưa nhập tên lớp học"]
        );

        $lop_hoc=LopHocModel::where('Ma_lop_hoc','=',$request->ma_lop_hoc)->first();
        $lop_hoc->ten_lop_hoc = $request->ten_lop_hoc;
        $lop_hoc->ghi_chu = $request->ghi_chu;
        $lop_hoc->save();
    }

    protected function xoaLopHoc($request){
        $lop_hoc=LopHocModel::where('Ma_lop_hoc','=',$request->ma_lop_hoc)->first();
        $lop_hoc->delete();
    }
}
