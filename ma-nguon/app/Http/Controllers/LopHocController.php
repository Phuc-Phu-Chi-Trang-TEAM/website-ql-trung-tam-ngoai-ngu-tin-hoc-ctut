<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LopHocModel;
use App\ChungChiModel;
use App\BuoiHocModel;
use App\KhoaHocModel;
use App\KieuLichHocModel;

class LopHocController extends Controller
{
    protected function layDanhSachLopHoc(){
        $ds_lop_hoc = LopHocModel::all();
        $ds_chung_chi = ChungChiModel::all();
        $ds_buoi_hoc = BuoiHocModel::all();
        $ds_khoa_hoc = KhoaHocModel::all();
        $ds_kieu_lich_hoc = KieuLichHocModel::all();
        return view ('quan-ly-lop-hoc',['ds_lop_hoc'=>$ds_lop_hoc,
                                        'ds_chung_chi'=>$ds_chung_chi,
                                        'ds_buoi_hoc'=>$ds_buoi_hoc,
                                        'ds_khoa_hoc'=>$ds_khoa_hoc,
                                        'ds_kieu_lich_hoc'=>$ds_kieu_lich_hoc
                                        ]);
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
        $lop_hoc->ma_khoa_hoc = $request->ma_khoa_hoc;
        $lop_hoc->ma_buoi_hoc = $request->ma_buoi_hoc;
        $lop_hoc->ma_chung_chi = $request->ma_chung_chi;
        $lop_hoc->so_luong_hoc_vien = 0;
        $lop_hoc->ngay_khai_giang = $request->ngay_khai_giang;
        $lop_hoc->ngay_be_giang = $request->ngay_be_giang;
        $lop_hoc->ma_kieu_lich_hoc = $request->ma_kieu_lich_hoc;
        $lop_hoc->save();
    }
    
    protected function layThongTinLopHoc($id){
        $thong_tin_lop_hoc = LopHocModel::lienKetDuLieu($id);
        $ds_lop_hoc = LopHocModel::all();
        $ds_chung_chi = ChungChiModel::all();
        $ds_buoi_hoc = BuoiHocModel::all();
        $ds_khoa_hoc = KhoaHocModel::all();
        $ds_kieu_lich_hoc = KieuLichHocModel::all();
        return view ('quan-ly-lop-hoc',['ds_lop_hoc'=>$ds_lop_hoc,
                                        'ds_chung_chi'=>$ds_chung_chi,
                                        'ds_buoi_hoc'=>$ds_buoi_hoc,
                                        'ds_khoa_hoc'=>$ds_khoa_hoc,
                                        'ds_kieu_lich_hoc'=>$ds_kieu_lich_hoc,
                                        'thong_tin_lop_hoc'=>$thong_tin_lop_hoc
                                        ]);
    }

    protected function chiTietLopHoc($id){
        $chi_tiet_lop_hoc = LopHocModel::lienKetDuLieu($id);
        $ds_lop_hoc = LopHocModel::all();
        return view ('quan-ly-lop-hoc',['ds_lop_hoc'=>$ds_lop_hoc,'chi_tiet_lop_hoc'=>$chi_tiet_lop_hoc]);
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
        $lop_hoc->ma_khoa_hoc = $request->ma_khoa_hoc;
        $lop_hoc->ma_buoi_hoc = $request->ma_buoi_hoc;
        $lop_hoc->ma_chung_chi = $request->ma_chung_chi;
        $lop_hoc->so_luong_hoc_vien = 0;
        $lop_hoc->ngay_khai_giang = $request->ngay_khai_giang;
        $lop_hoc->ngay_be_giang = $request->ngay_be_giang;
        $lop_hoc->ma_kieu_lich_hoc = $request->ma_kieu_lich_hoc;
        $lop_hoc->save();
    }

    protected function xoaLopHoc($request){
        $lop_hoc=LopHocModel::where('Ma_lop_hoc','=',$request->ma_lop_hoc)->first();
        $lop_hoc->delete();
    }
}
