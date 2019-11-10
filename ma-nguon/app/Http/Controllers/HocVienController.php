<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HocVienModel;
use App\HocLopModel;
use App\ChungChiModel;
use App\LopHocModel;

class HocVienController extends Controller
{
    protected function layDanhSachHocVien(){
        $ds_chung_chi = ChungChiModel::all();
        $ds_lop_hoc = LopHocModel::layDSLopHocChuaKetThuc();
        return view ('dang-ky-hoc-vien',['ds_chung_chi'=>$ds_chung_chi,
                                        'ds_lop_hoc'=>$ds_lop_hoc]);
    }

    protected function batSuKienClickButton(Request $request){
        if ($request->btn_them){
            $this->themHocVien($request);
            return redirect('dang-ky-hoc-vien')->with('thongbao','Thêm thành công');
        }
        if ($request->btn_luu){
            $this->capNhatThongTinHocVien($request);
            return redirect('dang-ky-hoc-vien')->with('thongbao','Cập nhật thông tin học viên thành công');
        }
        if ($request->btn_xoa){
            $this->xoaHocVien($request);
            return redirect('dang-ky-hoc-vien')->with('thongbao','Xóa thành công');
        }
        if ($request->btn_huy){
            return redirect('dang-ky-hoc-vien')->with('thongbao','Đã hủy thao tác');
        }
    }

    protected function loadCbxLopHoc($ma_chung_chi){
        $ds_lop_hoc = LopHocModel::layDSLHTheoChungChi($ma_chung_chi);
        echo '<option value="">Chọn lớp học</option>';
        foreach($ds_lop_hoc as $dslh){
            echo '<option value="'.$dslh->Ma_lop_hoc.'">('.$dslh->Ma_lop_hoc.') '.$dslh->Ten_lop_hoc.'</option>';
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
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->So_luong_hoc_vien.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->Ten_chung_chi.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->Ten_buoi_hoc.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->Ten_kieu_lich_hoc.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->Ngay_khai_giang.'</td>
                    <td style="border: 1px solid #aaaaaa;">'.$ctlhl->Ngay_be_giang.'</td>
                </tr>';
            }
        }

    public function loadDSHocVien($id){
        $ds_hoc_vien = HocVienModel::layDSHocVien($id);
        if (isset($ds_hoc_vien[0])==false){
            echo '  <thead>
                        <tr align="center" role="row">
                            <th class="sorting_desc" style="width: 800px;">Không có kết quả</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align:center">Không tìm thấy học viên thuộc lớp này. Hãy nhập lại</td>
                        </tr>
                    </tbody>';
        }
        else{
            echo '<thead>
                    <tr align="center" role="row">
                        <th class="sorting_desc" style="width: 70px;">ID</th>
                        <th class="sorting"  style="width: 300px;">Tên học viên</th>
                        <th class="sorting"  style="width: 150px;">Ngày sinh</th>
                        <th class="sorting"  style="width: 500px;">Lớp học</th>
                        <th class="sorting"  style="width: 100px;">Chi tiết</th>
                        <th class="sorting"  style="width: 80px;">Xóa</th>
                        <th class="sorting"  style="width: 80px;">Sửa</th>
                    </tr>
                </thead>';
            foreach($ds_hoc_vien as $dshv){
                echo '
                        <tr class="gradeC odd" align="center" role="row">
                            <td class="sorting_1">'.$dshv->Ma_hoc_vien.'</td>
                            <td>'.$dshv->Ten_hoc_vien.'</td>
                            <td>'.$dshv->Ngay_sinh.'</td>
                            <td>(ID:'.$dshv->Ma_lop_hoc.') '.$dshv->Ten_lop_hoc.'</td>
                            <td class="center"><i class="icon-trash"></i><a href="dang-ky-hoc-vien/xem-chi-tiet/'.$dshv->Ma_hoc_vien.'">Chi tiết</a></td>
                            <td class="center"><i class="icon-trash"></i><a href="dang-ky-hoc-vien/delete/'.$dshv->Ma_hoc_vien.'"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="dang-ky-hoc-vien/'.$dshv->Ma_hoc_vien.'">Sửa</a></td>
                        </tr>';
            }
        }
    }

    protected function themHocVien($request){
        $this->validate(
            $request,
            ['ten_hoc_vien'=>'required',
            'ngay_sinh'=>'required',
            'noi_sinh'=>'required',
            'cmnd'=>'required',
            'ma_lop_hoc'=>'required'],

            ['ten_hoc_vien.required'=>"Bạn chưa nhập tên học viên",
            'ngay_sinh.required'=>"Bạn chưa nhập ngày sinh",
            'noi_sinh.required'=>"Bạn chưa nhập nơi sinh",
            'cmnd.required'=>"Bạn chưa nhập CMND",
            'ma_lop_hoc.required'=>"Bạn chưa chọn lớp học"]
        );

        $hoc_vien = new HocVienModel;
        $hoc_vien->ten_hoc_vien = $request->ten_hoc_vien;
        $hoc_vien->ngay_sinh = $request->ngay_sinh;
        $hoc_vien->noi_sinh = $request->noi_sinh;
        $hoc_vien->cmnd = $request->cmnd;
        $hoc_vien->dia_chi = $request->dia_chi;
        $hoc_vien->dien_thoai = $request->dien_thoai;
        $hoc_vien->email = $request->email;
        $hoc_vien->ghi_chu = $request->ghi_chu;
        $hoc_vien->save();

        $ma_hoc_vien = HocVienModel::layMaHocVienLonNhat();

        $hoc_lop = new HocLopModel;
        $hoc_lop->ma_hoc_vien = $ma_hoc_vien->Ma_hoc_vien ;
        $hoc_lop->ma_lop_hoc = $request->ma_lop_hoc ;
        $hoc_lop->save();
    }
    
    protected function layThongTinHocVien($id){
        $thong_tin_hoc_vien = HocVienModel::layThongTinHocVien($id);
        $ds_chung_chi = ChungChiModel::all();
        $ds_lop_hoc = LopHocModel::layDSLopHocChuaKetThuc();
        return view ('dang-ky-hoc-vien',['thong_tin_hoc_vien'=>$thong_tin_hoc_vien,
                                        'ds_chung_chi'=>$ds_chung_chi,
                                        'ds_lop_hoc'=>$ds_lop_hoc]);
    }

    protected function chiTietHocVien($id){
        $chi_tiet_hoc_vien = HocVienModel::layThongTinHocVien($id);
        return view ('dang-ky-hoc-vien',['chi_tiet_hoc_vien'=>$chi_tiet_hoc_vien]);
    }

    protected function layThongTinHocVienCanXoa($id){
        $thong_tin_hoc_vien_xoa = HocVienModel::where('Ma_hoc_vien',$id)->get();
        $ds_hoc_vien = HocVienModel::all();
        return view ('dang-ky-hoc-vien',['ds_hoc_vien'=>$ds_hoc_vien,'thong_tin_hoc_vien_xoa'=>$thong_tin_hoc_vien_xoa]);
    }

    protected function capNhatThongTinHocVien($request){
        $this->validate(
            $request,
            ['ten_hoc_vien'=>'required',
            'ngay_sinh'=>'required',
            'noi_sinh'=>'required',
            'cmnd'=>'required',
            'ma_lop_hoc'=>'required'],

            ['ten_hoc_vien.required'=>"Bạn chưa nhập tên học viên",
            'ngay_sinh.required'=>"Bạn chưa nhập ngày sinh",
            'noi_sinh.required'=>"Bạn chưa nhập nơi sinh",
            'cmnd.required'=>"Bạn chưa nhập CMND",
            'ma_lop_hoc.required'=>"Bạn chưa chọn lớp học"]
        );

        $hoc_vien=HocVienModel::where('Ma_hoc_vien','=',$request->ma_hoc_vien)->first();
        $hoc_vien->ten_hoc_vien = $request->ten_hoc_vien;
        $hoc_vien->ngay_sinh = $request->ngay_sinh;
        $hoc_vien->noi_sinh = $request->noi_sinh;
        $hoc_vien->cmnd = $request->cmnd;
        $hoc_vien->dia_chi = $request->dia_chi;
        $hoc_vien->dien_thoai = $request->dien_thoai;
        $hoc_vien->email = $request->email;
        $hoc_vien->ghi_chu = $request->ghi_chu;
        $hoc_vien->save();

        $hoc_lop=HocLopModel::where('Ma_hoc_vien','=',$request->ma_hoc_vien)->first();
        $hoc_lop->ma_lop_hoc = $request->ma_lop_hoc;
        $hoc_lop->save();
    }

    protected function xoaHocVien($request){
        $hoc_vien=HocVienModel::where('Ma_hoc_vien','=',$request->ma_hoc_vien)->first();
        $hoc_vien->delete();
    }
}
