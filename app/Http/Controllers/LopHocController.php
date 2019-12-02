<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LopHocModel;
use App\ChungChiModel;
use App\BuoiHocModel;
use App\KhoaHocModel;
use App\KieuLichHocModel;
use App\LichHocModel;
use App\PhongHocModel;

class LopHocController extends Controller
{
    protected function layDanhSachLopHoc(){
        $username = session()->get('username');
        if (isset($username)){
            $ds_lop_hoc = LopHocModel::all();
            $ds_chung_chi = ChungChiModel::all();
            $ds_buoi_hoc = BuoiHocModel::all();
            $ds_khoa_hoc = KhoaHocModel::all();
            $ds_phong_hoc = PhongHocModel::all();
            $ds_kieu_lich_hoc = KieuLichHocModel::all();
            return view ('quan-ly-lop-hoc',['ds_lop_hoc'=>$ds_lop_hoc,
                                            'ds_chung_chi'=>$ds_chung_chi,
                                            'ds_buoi_hoc'=>$ds_buoi_hoc,
                                            'ds_khoa_hoc'=>$ds_khoa_hoc,
                                            'ds_kieu_lich_hoc'=>$ds_kieu_lich_hoc,
                                            'ds_phong_hoc'=>$ds_phong_hoc,
                                            'username'=>$username
                                            ]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
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
            ['ten_lop_hoc'=>'required',
            'ma_khoa_hoc'=>'required',
            'ma_buoi_hoc'=>'required',
            'ma_chung_chi'=>'required',
            'ngay_khai_giang'=>'required',
            'ngay_be_giang'=>'required',
            'ma_kieu_lich_hoc'=>'required',
            'ma_phong_hoc'=>'required'],

            ['ten_lop_hoc.required'=>"Bạn chưa nhập tên lớp học",
            'ma_khoa_hoc.required'=>"Bạn chưa chọn khóa học",
            'ma_buoi_hoc.required'=>"Bạn chưa chọn buổi học",
            'ma_chung_chi.required'=>"Bạn chưa chọn chứng chỉ",
            'ngay_khai_giang.required'=>"Bạn chưa nhập ngày khai giảng",
            'ngay_be_giang.required'=>"Bạn chưa nhập ngày bế giảng",
            'ma_kieu_lich_hoc.required'=>"Bạn chưa chọn lịch học",
            'ma_phong_hoc.required'=>"Bạn chưa chọn phòng học"]
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
        $lop_hoc->ma_phong_hoc = $request->ma_phong_hoc;
        $lop_hoc->save();

        $ma_lop_hoc_vua_them = LopHocModel::layMaLopHocLonNhat();
        $this->themLichHoc($ma_lop_hoc_vua_them->Ma_lop_hoc, $request->ngay_khai_giang, $request->ngay_be_giang, $request->ma_kieu_lich_hoc);
    }
    
    protected function layThongTinLopHoc($id){
        $username = session()->get('username');
        if (isset($username)){
            $thong_tin_lop_hoc = LopHocModel::lienKetDuLieu($id);
            $ds_lop_hoc = LopHocModel::all();
            $ds_chung_chi = ChungChiModel::all();
            $ds_buoi_hoc = BuoiHocModel::all();
            $ds_khoa_hoc = KhoaHocModel::all();
            $ds_kieu_lich_hoc = KieuLichHocModel::all();
            $ds_phong_hoc = PhongHocModel::all();
            return view ('quan-ly-lop-hoc',['ds_lop_hoc'=>$ds_lop_hoc,
                                            'ds_chung_chi'=>$ds_chung_chi,
                                            'ds_buoi_hoc'=>$ds_buoi_hoc,
                                            'ds_khoa_hoc'=>$ds_khoa_hoc,
                                            'ds_kieu_lich_hoc'=>$ds_kieu_lich_hoc,
                                            'thong_tin_lop_hoc'=>$thong_tin_lop_hoc,
                                            'ds_phong_hoc'=>$ds_phong_hoc,
                                            'username'=>$username
                                            ]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function chiTietLopHoc($id){
        $username = session()->get('username');
        if (isset($username)){
            $chi_tiet_lop_hoc = LopHocModel::lienKetDuLieu($id);
            $ds_lop_hoc = LopHocModel::all();
            return view ('quan-ly-lop-hoc',['ds_lop_hoc'=>$ds_lop_hoc,'chi_tiet_lop_hoc'=>$chi_tiet_lop_hoc,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function layThongTinLopHocCanXoa($id){
        $username = session()->get('username');
        if (isset($username)){
            $thong_tin_lop_hoc_xoa = LopHocModel::where('Ma_lop_hoc',$id)->get();
            $ds_lop_hoc = LopHocModel::all();
            return view ('quan-ly-lop-hoc',['ds_lop_hoc'=>$ds_lop_hoc,'thong_tin_lop_hoc_xoa'=>$thong_tin_lop_hoc_xoa,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function capNhatThongTinLopHoc($request){
        $this->validate(
            $request,
            ['ten_lop_hoc'=>'required',
            'ma_khoa_hoc'=>'required',
            'ma_buoi_hoc'=>'required',
            'ma_chung_chi'=>'required',
            'ngay_khai_giang'=>'required',
            'ngay_be_giang'=>'required',
            'ma_kieu_lich_hoc'=>'required',
            'ma_phong_hoc'=>'required'],

            ['ten_lop_hoc.required'=>"Bạn chưa nhập tên lớp học",
            'ma_khoa_hoc.required'=>"Bạn chưa chọn khóa học",
            'ma_buoi_hoc.required'=>"Bạn chưa chọn buổi học",
            'ma_chung_chi.required'=>"Bạn chưa chọn chứng chỉ",
            'ngay_khai_giang.required'=>"Bạn chưa nhập ngày khai giảng",
            'ngay_be_giang.required'=>"Bạn chưa nhập ngày bế giảng",
            'ma_kieu_lich_hoc.required'=>"Bạn chưa chọn lịch học",
            'ma_phong_hoc.required'=>"Bạn chưa chọn phòng học"]
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
        $lop_hoc->ma_phong_hoc = $request->ma_phong_hoc;
        $lop_hoc->save();

        LichHocModel::xoaLichHoc($request->ma_lop_hoc);
        $this->themLichHoc($request->ma_lop_hoc, $request->ngay_khai_giang, $request->ngay_be_giang, $request->ma_kieu_lich_hoc);

    }

    protected function xoaLopHoc($request){
        $lop_hoc=LopHocModel::where('Ma_lop_hoc','=',$request->ma_lop_hoc)->first();
        $lop_hoc->delete();
    }

    // public function them($request){
    //     $this->themLichHoc($request->ngay_khai_giang, $request->ngay_be_giang, $request->ma_kieu_lich_hoc);
    // }

    public function themLichHoc($ma_lop_hoc, $ngay_khai_giang, $ngay_be_giang, $ma_kieu_lich_hoc){
        // $ngay = date_create($ngay_khai_giang);
        // $ngay_xet = getdate(strtotime($ngay_khai_giang));
        // echo $ngay_xet['wday'];
        // $ngay_cong = date_add($ngay, date_interval_create_from_date_string('1 days'));
        // $format_ngay_cong = date_format($ngay_cong,'Y-m-d');
        // $wd_ngay_cong = getdate(strtotime($format_ngay_cong));
        // echo $wd_ngay_cong['wday'];
        
        $ngay_xet = $ngay_khai_giang;
        if ($ma_kieu_lich_hoc ==1 ){
            while ($ngay_xet <= $ngay_be_giang){
                $ngay_xet_strtotime = getdate(strtotime($ngay_xet));
                if ($ngay_xet_strtotime['wday']==1 || $ngay_xet_strtotime['wday']==3 || $ngay_xet_strtotime['wday']==5){
                    $lich_hoc = new LichHocModel;
                    $lich_hoc->ma_lop_hoc = $ma_lop_hoc;
                    $lich_hoc->ngay_hoc = $ngay_xet;
                    $lich_hoc->thu = $ngay_xet_strtotime['wday']+1;
                    $lich_hoc->save();
                }
                $ngay_xet_create = date_create($ngay_xet);
                $ngay_cong = date_add($ngay_xet_create, date_interval_create_from_date_string('1 days'));
                $ngay_xet = date_format($ngay_cong,'Y-m-d');
            }
        }
        else if ($ma_kieu_lich_hoc ==2 ){
            while ($ngay_xet <= $ngay_be_giang){
                $ngay_xet_strtotime = getdate(strtotime($ngay_xet));
                if ($ngay_xet_strtotime['wday']==2 || $ngay_xet_strtotime['wday']==4 || $ngay_xet_strtotime['wday']==6){
                    $lich_hoc = new LichHocModel;
                    $lich_hoc->ma_lop_hoc = $ma_lop_hoc;
                    $lich_hoc->ngay_hoc = $ngay_xet;
                    $lich_hoc->thu = $ngay_xet_strtotime['wday']+1;
                    $lich_hoc->save();
                }
                $ngay_xet_create = date_create($ngay_xet);
                $ngay_cong = date_add($ngay_xet_create, date_interval_create_from_date_string('1 days'));
                $ngay_xet = date_format($ngay_cong,'Y-m-d');
            }
        }
    }
}
