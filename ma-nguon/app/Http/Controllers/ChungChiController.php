<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChungChiModel;

class ChungChiController extends Controller
{
    protected function layDanhSachChungChi(){
        $username = session()->get('username');
        if (isset($username)){
            $ds_chung_chi = ChungChiModel::all();
            return view ('quan-ly-chung-chi',['ds_chung_chi'=>$ds_chung_chi,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function batSuKienClickButton(Request $request){
        if ($request->btn_them){
            $this->themChungChi($request);
            return redirect('quan-ly-chung-chi')->with('thongbao','Thêm thành công');
        }
        if ($request->btn_luu){
            $this->capNhatThongTinChungChi($request);
            return redirect('quan-ly-chung-chi')->with('thongbao','Cập nhật thông tin chứng chỉ thành công');
        }
        if ($request->btn_xoa){
            $this->xoaChungChi($request);
            return redirect('quan-ly-chung-chi')->with('thongbao','Xóa thành công');
        }
        if ($request->btn_huy){
            return redirect('quan-ly-chung-chi')->with('thongbao','Đã hủy thao tác');
        }
    }

    protected function themChungChi($request){
        $this->validate(
            $request,
            ['ten_chung_chi'=>'required'],
            ['ten_chung_chi.required'=>"Bạn chưa nhập tên chứng chỉ"]
        );

        $chung_chi = new ChungChiModel;
        $chung_chi->ten_chung_chi = $request->ten_chung_chi;
        $chung_chi->gia_tien = $request->gia_tien;
        $chung_chi->ghi_chu = $request->ghi_chu;
        $chung_chi->save();
    }
    
    protected function layThongTinChungChi($id){
        $username = session()->get('username');
        if (isset($username)){
            $thong_tin_chung_chi = ChungChiModel::where('Ma_chung_chi',$id)->get();
            $ds_chung_chi = ChungChiModel::all();
            return view ('quan-ly-chung-chi',['ds_chung_chi'=>$ds_chung_chi,'thong_tin_chung_chi'=>$thong_tin_chung_chi,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function layThongTinChungChiCanXoa($id){
        $username = session()->get('username');
        if (isset($username)){
            $thong_tin_chung_chi_xoa = ChungChiModel::where('Ma_chung_chi',$id)->get();
            $ds_chung_chi = ChungChiModel::all();
            return view ('quan-ly-chung-chi',['ds_chung_chi'=>$ds_chung_chi,'thong_tin_chung_chi_xoa'=>$thong_tin_chung_chi_xoa,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function capNhatThongTinChungChi($request){
        $this->validate(
            $request,
            ['ten_chung_chi'=>'required'],
            ['ten_chung_chi.required'=>"Bạn chưa nhập tên chứng chỉ"]
        );

        $chung_chi=ChungChiModel::where('Ma_chung_chi','=',$request->ma_chung_chi)->first();
        $chung_chi->ten_chung_chi = $request->ten_chung_chi;
        $chung_chi->gia_tien = $request->gia_tien;
        $chung_chi->ghi_chu = $request->ghi_chu;
        $chung_chi->save();
    }

    protected function xoaChungChi($request){
        $chung_chi=ChungChiModel::where('Ma_chung_chi','=',$request->ma_chung_chi)->first();
        $chung_chi->delete();
    }
}
