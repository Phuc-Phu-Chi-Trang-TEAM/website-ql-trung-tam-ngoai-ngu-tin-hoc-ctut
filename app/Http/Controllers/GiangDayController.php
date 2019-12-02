<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiangDayModel;
use App\ChungChiModel;
use App\LopHocModel;
use App\GiaoVienModel;
use App\ChuyenNganhModel;

class GiangDayController extends Controller
{
    protected function layDanhSachGiangDay(){
        $username = session()->get('username');
        if (isset($username)){
            $ds_giang_day = GiangDayModel::layDSGiangDay();
            $ds_chung_chi = ChungChiModel::all();
            $ds_lop_hoc = GiangDayModel::layDSLopHocChuaPhanCong();
            $ds_giao_vien = GiaoVienModel::all();
            $ds_chuyen_nganh = ChuyenNganhModel::all();
            return view ('phan-cong-giang-day',['ds_giang_day'=>$ds_giang_day,
                                            'ds_chung_chi'=>$ds_chung_chi,
                                            'ds_lop_hoc'=>$ds_lop_hoc,
                                            'ds_giao_vien'=>$ds_giao_vien,
                                            'ds_chuyen_nganh'=>$ds_chuyen_nganh,
                                            'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function batSuKienClickButton(Request $request){
        if ($request->btn_them){
            $this->capNhatThongTinGiangDay($request);
            return redirect('phan-cong-giang-day')->with('thongbao','Thêm thành công');
        }
        if ($request->btn_luu){
            $this->capNhatThongTinGiangDay($request);
            return redirect('phan-cong-giang-day')->with('thongbao','Cập nhật thông tin giảng dạy thành công');
        }
        if ($request->btn_xoa){
            $this->xoaGiangDay($request);
            return redirect('phan-cong-giang-day')->with('thongbao','Xóa thành công');
        }
        if ($request->btn_huy){
            return redirect('phan-cong-giang-day')->with('thongbao','Đã hủy thao tác');
        }
    }

    protected function loadCbxLopHoc($ma_chung_chi){
        $ds_lop_hoc = GiangDayModel::layDSLHTheoChungChi($ma_chung_chi);
        echo '<option value="">Chọn lớp học</option>';
        foreach($ds_lop_hoc as $dslh){
            echo '<option value="'.$dslh->Ma_lop_hoc.'">('.$dslh->Ma_lop_hoc.') '.$dslh->Ten_lop_hoc.'</option>';
        }
    }

    protected function loadCbxGiaoVien($ma_chuyen_nganh){
        $ds_giao_vien = GiaoVienModel::where('Ma_chuyen_nganh','=',$ma_chuyen_nganh)->get();
        echo '<option value="">Chọn giáo viên</option>';
        foreach($ds_giao_vien as $dsgv){
            echo '<option value="'.$dsgv->Ma_giao_vien.'">('.$dsgv->Ma_giao_vien.') '.$dsgv->Ten_giao_vien.'</option>';
        }
    }

    protected function loadChiTietLopHoc($ma_lop_hoc){
        $chi_tiet_lop_hoc_load = LopHocModel::lienKetDuLieu($ma_lop_hoc);
        foreach($chi_tiet_lop_hoc_load as $ctlhl){
            echo '<thead>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">ID</th>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Tên lớp</th>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">SLHV</th>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Chứng chỉ</th>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Buổi</th>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Lịch học</th>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Khai giảng</th>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Bế giảng</th>
                </thead>
                <tr>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->Ma_lop_hoc.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->Ten_lop_hoc.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->So_luong_giang_day.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->Ten_chung_chi.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->Ten_buoi_hoc.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->Ten_kieu_lich_hoc.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->Ngay_khai_giang.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->Ngay_be_giang.'</td>
                </tr>';
        }
    }

    protected function loadChiTietGiaoVien($ma_giao_vien){
        $chi_tiet_giao_vien_load = GiaoVienModel::layTTGiaoVien($ma_giao_vien);
        foreach($chi_tiet_giao_vien_load as $ctgvl){
            echo '<thead>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">ID</th>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Tên giáo viên</th>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Ngày sinh</th>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Học vị</th>
                    <th style="border: 1px solid #aaaaaa;background-color:#cccccc">Chuyên ngành</th>
                </thead>
                <tr>
                    <td style="border: 1px solid #aaaaaa;">'.$ctgvl->Ma_giao_vien.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctgvl->Ten_giao_vien.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctgvl->Ngay_sinh.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctgvl->Hoc_vi.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctgvl->Ten_chuyen_nganh.'</td>
                </tr>';
        }
    }

    protected function themGiangDay($request){
        $this->validate(
            $request,
            ['ma_lop_hoc'=>'required',
            'ma_giao_vien'=>'required'],

            ['ma_lop_hoc.required'=>"Bạn chưa chọn lớp học",
            'ma_giao_vien.required'=>"Bạn chưa chọn giáo viên"]
        );

        $giang_day = new GiangDayModel;
        $giang_day->ma_lop_hoc = $request->ma_lop_hoc;
        $giang_day->ma_giao_vien = $request->ma_giao_vien;
        $giang_day->save();
    }
    
    protected function layThongTinGiangDay($id){
        $username = session()->get('username');
        if (isset($username)){
            $thong_tin_lop_hoc = LopHocModel::lienKetDuLieu($id);
            $ma_giao_vien = GiangDayModel::layMaGVGD($id);
            $thong_tin_giao_vien = GiaoVienModel::layTTGiaoVien($ma_giao_vien->Ma_giao_vien);
            $ds_giang_day = GiangDayModel::layDSGiangDay();
            $ds_chuyen_nganh = ChuyenNganhModel::all();
            $ds_giao_vien = GiaoVienModel::all();
            return view ('phan-cong-giang-day',['ds_giang_day'=>$ds_giang_day,
                                            'thong_tin_lop_hoc'=>$thong_tin_lop_hoc,
                                            'thong_tin_giao_vien'=>$thong_tin_giao_vien,
                                            'ds_chuyen_nganh'=>$ds_chuyen_nganh,
                                            'ds_giao_vien'=>$ds_giao_vien,
                                            'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function chiTietGiangDay($id){
        $username = session()->get('username');
        if (isset($username)){
            $chi_tiet_giang_day = GiangDayModel::where('Ma_giang_day',$id)->get();
            $ds_giang_day = GiangDayModel::all();
            return view ('phan-cong-giang-day',['ds_giang_day'=>$ds_giang_day,'chi_tiet_giang_day'=>$chi_tiet_giang_day,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function layThongTinGiangDayCanXoa($id){
        $username = session()->get('username');
        if (isset($username)){
            $thong_tin_giang_day_xoa = GiangDayModel::where('Ma_giang_day',$id)->get();
            $ds_giang_day = GiangDayModel::all();
            return view ('phan-cong-giang-day',['ds_giang_day'=>$ds_giang_day,'thong_tin_giang_day_xoa'=>$thong_tin_giang_day_xoa,'username'=>$username]);
        }
        else{
            return redirect('dang-nhap')->with('thongbao','Bạn chưa đăng nhập');
        }
    }

    protected function capNhatThongTinGiangDay($request){
        $this->validate(
            $request,
            ['ma_giao_vien'=>'required'],

            ['ma_giao_vien.required'=>"Bạn chưa chọn giáo viên"]
        );

        $giang_day=GiangDayModel::where('Ma_lop_hoc','=',$request->ma_lop_hoc)->first();
        $giang_day->ma_giao_vien = $request->ma_giao_vien;
        $giang_day->save();
    }

    protected function xoaGiangDay($request){
        $giang_day=GiangDayModel::where('Ma_giang_day','=',$request->ma_giang_day)->first();
        $giang_day->delete();
    }
}
