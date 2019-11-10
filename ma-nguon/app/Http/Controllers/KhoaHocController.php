<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhoaHocModel;

class KhoaHocController extends Controller
{
    protected function layDanhSachKhoaHoc(){
        $username = session()->get('username');
        if (isset($username)){
            $ds_khoa_hoc = KhoaHocModel::all();
            return view ('quan-ly-khoa-hoc',['ds_khoa_hoc'=>$ds_khoa_hoc,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function batSuKienClickButton(Request $request){
        if ($request->btn_them){
            $this->themKhoaHoc($request);
            return redirect('quan-ly-khoa-hoc')->with('thongbao','Thêm thành công');
        }
        if ($request->btn_luu){
            $this->capNhatThongTinKhoaHoc($request);
            return redirect('quan-ly-khoa-hoc')->with('thongbao','Cập nhật thông tin khóa học thành công');
        }
        if ($request->btn_xoa){
            $this->xoaKhoaHoc($request);
            return redirect('quan-ly-khoa-hoc')->with('thongbao','Xóa thành công');
        }
        if ($request->btn_huy){
            return redirect('quan-ly-khoa-hoc')->with('thongbao','Đã hủy thao tác');
        }
    }

    protected function themKhoaHoc($request){
        $this->validate(
            $request,
            ['ten_khoa_hoc'=>'required'],
            ['ten_khoa_hoc.required'=>"Bạn chưa nhập tên khóa học"]
        );

        $khoa_hoc = new KhoaHocModel;
        $khoa_hoc->ten_khoa_hoc = $request->ten_khoa_hoc;
        $khoa_hoc->ghi_chu = $request->ghi_chu;
        $khoa_hoc->save();
    }
    
    protected function layThongTinKhoaHoc($id){
        $username = session()->get('username');
        if (isset($username)){
            $thong_tin_khoa_hoc = KhoaHocModel::where('Ma_khoa_hoc',$id)->get();
            $ds_khoa_hoc = KhoaHocModel::all();
            return view ('quan-ly-khoa-hoc',['ds_khoa_hoc'=>$ds_khoa_hoc,'thong_tin_khoa_hoc'=>$thong_tin_khoa_hoc,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function layThongTinKhoaHocCanXoa($id){
        $username = session()->get('username');
        if (isset($username)){
            $thong_tin_khoa_hoc_xoa = KhoaHocModel::where('Ma_khoa_hoc',$id)->get();
            $ds_khoa_hoc = KhoaHocModel::all();
            return view ('quan-ly-khoa-hoc',['ds_khoa_hoc'=>$ds_khoa_hoc,'thong_tin_khoa_hoc_xoa'=>$thong_tin_khoa_hoc_xoa,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function capNhatThongTinKhoaHoc($request){
        $this->validate(
            $request,
            ['ten_khoa_hoc'=>'required'],
            ['ten_khoa_hoc.required'=>"Bạn chưa nhập tên khóa học"]
        );

        $khoa_hoc=KhoaHocModel::where('Ma_khoa_hoc','=',$request->ma_khoa_hoc)->first();
        $khoa_hoc->ten_khoa_hoc = $request->ten_khoa_hoc;
        $khoa_hoc->ghi_chu = $request->ghi_chu;
        $khoa_hoc->save();
    }

    protected function xoaKhoaHoc($request){
        $khoa_hoc=KhoaHocModel::where('Ma_khoa_hoc','=',$request->ma_khoa_hoc)->first();
        $khoa_hoc->delete();
    }
}
