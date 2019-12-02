<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BuoiHocModel;

class BuoiHocController extends Controller
{
    protected function layDanhSachBuoiHoc(){
        $username = session()->get('username');
        if (isset($username)){
            $ds_buoi_hoc = BuoiHocModel::all();
            return view ('quan-ly-buoi-hoc',['ds_buoi_hoc'=>$ds_buoi_hoc,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function batSuKienClickButton(Request $request){
        if ($request->btn_them){
            $this->themBuoiHoc($request);
            return redirect('quan-ly-buoi-hoc')->with('thongbao','Thêm thành công');
        }
        if ($request->btn_luu){
            $this->capNhatThongTinBuoiHoc($request);
            return redirect('quan-ly-buoi-hoc')->with('thongbao','Cập nhật thông tin buổi học thành công');
        }
        if ($request->btn_xoa){
            $this->xoaBuoiHoc($request);
            return redirect('quan-ly-buoi-hoc')->with('thongbao','Xóa thành công');
        }
        if ($request->btn_huy){
            return redirect('quan-ly-buoi-hoc')->with('thongbao','Đã hủy thao tác');
        }
    }

    protected function themBuoiHoc($request){
        $this->validate(
            $request,
            ['ten_buoi_hoc'=>'required'],
            ['ten_buoi_hoc.required'=>"Bạn chưa nhập tên buổi học"]
        );

        $buoi_hoc = new BuoiHocModel;
        $buoi_hoc->ten_buoi_hoc = $request->ten_buoi_hoc;
        $buoi_hoc->ghi_chu = $request->ghi_chu;
        $buoi_hoc->save();
    }
    
    protected function layThongTinBuoiHoc($id){
        $username = session()->get('username');
        if (isset($username)){
            $thong_tin_buoi_hoc = BuoiHocModel::where('Ma_buoi_hoc',$id)->get();
            $ds_buoi_hoc = BuoiHocModel::all();
            return view ('quan-ly-buoi-hoc',['ds_buoi_hoc'=>$ds_buoi_hoc,'thong_tin_buoi_hoc'=>$thong_tin_buoi_hoc,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function layThongTinBuoiHocCanXoa($id){
        $username = session()->get('username');
        if (isset($username)){
            $thong_tin_buoi_hoc_xoa = BuoiHocModel::where('Ma_buoi_hoc',$id)->get();
            $ds_buoi_hoc = BuoiHocModel::all();
            return view ('quan-ly-buoi-hoc',['ds_buoi_hoc'=>$ds_buoi_hoc,'thong_tin_buoi_hoc_xoa'=>$thong_tin_buoi_hoc_xoa,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function capNhatThongTinBuoiHoc($request){
        $this->validate(
            $request,
            ['ten_buoi_hoc'=>'required'],
            ['ten_buoi_hoc.required'=>"Bạn chưa nhập tên buổi học"]
        );

        $buoi_hoc=BuoiHocModel::where('Ma_buoi_hoc','=',$request->ma_buoi_hoc)->first();
        $buoi_hoc->ten_buoi_hoc = $request->ten_buoi_hoc;
        $buoi_hoc->ghi_chu = $request->ghi_chu;
        $buoi_hoc->save();
    }

    protected function xoaBuoiHoc($request){
        $buoi_hoc=BuoiHocModel::where('Ma_buoi_hoc','=',$request->ma_buoi_hoc)->first();
        $buoi_hoc->delete();
    }
}
