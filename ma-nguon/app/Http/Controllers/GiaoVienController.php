<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiaoVienModel;
use App\ChuyenNganhModel;

class GiaoVienController extends Controller
{
    protected function layDanhSachGiaoVien(){
        $ds_giao_vien = GiaoVienModel::layDSGiaoVien();
        $ds_chuyen_nganh = ChuyenNganhModel::all();
        return view ('quan-ly-giao-vien',['ds_giao_vien'=>$ds_giao_vien,
                                        'ds_chuyen_nganh'=>$ds_chuyen_nganh]);
    }

    protected function batSuKienClickButton(Request $request){
        if ($request->btn_them){
            $this->themGiaoVien($request);
            return redirect('quan-ly-giao-vien')->with('thongbao','Thêm thành công');
        }
        if ($request->btn_luu){
            $this->capNhatThongTinGiaoVien($request);
            return redirect('quan-ly-giao-vien')->with('thongbao','Cập nhật thông tin giáo viên thành công');
        }
        if ($request->btn_xoa){
            $this->xoaGiaoVien($request);
            return redirect('quan-ly-giao-vien')->with('thongbao','Xóa thành công');
        }
        if ($request->btn_huy){
            return redirect('quan-ly-giao-vien')->with('thongbao','Đã hủy thao tác');
        }
    }

    protected function themGiaoVien($request){
        $this->validate(
            $request,
            ['ten_giao_vien'=>'required',
            'ngay_sinh'=>'required',
            'noi_sinh'=>'required',
            'cmnd'=>'required',
            'hoc_vi'=>'required',
            'ma_chuyen_nganh'=>'required'],

            ['ten_giao_vien.required'=>"Bạn chưa nhập tên giáo viên",
            'ngay_sinh.required'=>"Bạn chưa nhập ngày sinh",
            'noi_sinh.required'=>"Bạn chưa nhập nơi sinh",
            'cmnd.required'=>"Bạn chưa nhập CMND",
            'hoc_vi.required'=>"Bạn chưa chọn học vị",
            'ma_chuyen_nganh.required'=>"Bạn chưa chọn chuyên ngành"]
        );

        $giao_vien = new GiaoVienModel;
        $giao_vien->ten_giao_vien = $request->ten_giao_vien;
        $giao_vien->ngay_sinh = $request->ngay_sinh;
        $giao_vien->noi_sinh = $request->noi_sinh;
        $giao_vien->cmnd = $request->cmnd;
        $giao_vien->hoc_vi = $request->hoc_vi;
        $giao_vien->ma_chuyen_nganh = $request->ma_chuyen_nganh;
        $giao_vien->dia_chi = $request->dia_chi;
        $giao_vien->dien_thoai = $request->dien_thoai;
        $giao_vien->email = $request->email;
        $giao_vien->ghi_chu = $request->ghi_chu;
        $giao_vien->save();
    }
    
    protected function layThongTinGiaoVien($id){
        $thong_tin_giao_vien = GiaoVienModel::layTTGiaoVien($id);
        $ds_giao_vien = GiaoVienModel::layDSGiaoVien();
        $ds_chuyen_nganh = ChuyenNganhModel::all();
        return view ('quan-ly-giao-vien',['ds_giao_vien'=>$ds_giao_vien,
                                        'thong_tin_giao_vien'=>$thong_tin_giao_vien,
                                        'ds_chuyen_nganh'=>$ds_chuyen_nganh]);
    }

    protected function chiTietGiaoVien($id){
        $chi_tiet_giao_vien = GiaoVienModel::layTTGiaoVien($id);
        $ds_giao_vien = GiaoVienModel::layDSGiaoVien();
        return view ('quan-ly-giao-vien',['ds_giao_vien'=>$ds_giao_vien,'chi_tiet_giao_vien'=>$chi_tiet_giao_vien]);
    }

    protected function layThongTinGiaoVienCanXoa($id){
        $thong_tin_giao_vien_xoa = GiaoVienModel::where('Ma_giao_vien',$id)->get();
        $ds_giao_vien = GiaoVienModel::layDSGiaoVien();
        return view ('quan-ly-giao-vien',['ds_giao_vien'=>$ds_giao_vien,'thong_tin_giao_vien_xoa'=>$thong_tin_giao_vien_xoa]);
    }

    protected function capNhatThongTinGiaoVien($request){
        $this->validate(
            $request,
            ['ten_giao_vien'=>'required',
            'ngay_sinh'=>'required',
            'noi_sinh'=>'required',
            'cmnd'=>'required',
            'hoc_vi'=>'required',
            'ma_chuyen_nganh'=>'required'],

            ['ten_giao_vien.required'=>"Bạn chưa nhập tên giáo viên",
            'ngay_sinh.required'=>"Bạn chưa nhập ngày sinh",
            'noi_sinh.required'=>"Bạn chưa nhập nơi sinh",
            'cmnd.required'=>"Bạn chưa nhập CMND",
            'hoc_vi.required'=>"Bạn chưa chọn học vị",
            'ma_chuyen_nganh.required'=>"Bạn chưa chọn chuyên ngành"]
        );

        $giao_vien=GiaoVienModel::where('Ma_giao_vien','=',$request->ma_giao_vien)->first();
        $giao_vien->ten_giao_vien = $request->ten_giao_vien;
        $giao_vien->ngay_sinh = $request->ngay_sinh;
        $giao_vien->noi_sinh = $request->noi_sinh;
        $giao_vien->cmnd = $request->cmnd;
        $giao_vien->hoc_vi = $request->hoc_vi;
        $giao_vien->ma_chuyen_nganh = $request->ma_chuyen_nganh;
        $giao_vien->dia_chi = $request->dia_chi;
        $giao_vien->dien_thoai = $request->dien_thoai;
        $giao_vien->email = $request->email;
        $giao_vien->ghi_chu = $request->ghi_chu;
        $giao_vien->save();
    }

    protected function xoaGiaoVien($request){
        $giao_vien=GiaoVienModel::where('Ma_giao_vien','=',$request->ma_giao_vien)->first();
        $giao_vien->delete();
    }

    public function timKiemGV($tu_khoa){
        $ds_giao_vien = GiaoVienModel::timKiemGV($tu_khoa);
        if (isset($ds_giao_vien)==false){
            echo '
                <thead>
                    <tr align="center" role="row">
                        <th style="width:800px">Không tìm thấy kết quả</th>
                    </tr>
                </thead>
                <tbody>
                    <td>Không có kết quả ứng với từ khóa bạn tìm. Hãy thử lại.</td>
                </tbody>';
        }
        else{
            echo '
                <thead>
                    <tr align="center" role="row">
                        <th class="sorting_desc" style="width: 100px;">ID</th>
                        <th class="sorting"  style="width: 300px;">Tên giáo viên</th>
                        <th class="sorting"  style="width: 300px;">Học vị</th>
                        <th class="sorting"  style="width: 300px;">Chuyên ngành</th>
                        <th class="sorting"  style="width: 100px;">Chi tiết</th>
                        <th class="sorting"  style="width: 100px;">Xóa</th>
                        <th class="sorting"  style="width: 100px;">Sửa</th>
                    </tr>
                </thead>';
            foreach ($ds_giao_vien as $dsgv){
                echo '
                        <tr class="gradeC odd" align="center" role="row">
                            <td class="sorting_1">'.$dsgv->Ma_giao_vien.'</td>
                            <td>'.$dsgv->Ten_giao_vien.'</td>
                            <td>'.$dsgv->Hoc_vi.'</td>
                            <td>'.$dsgv->Ten_chuyen_nganh.'</td>
                            <td class="center"><i class="icon-trash"></i><a href="quan-ly-giao-vien/xem-chi-tiet/'.$dsgv->Ma_giao_vien.'">Chi tiết</a></td>
                            <td class="center"><i class="icon-trash"></i><a href="quan-ly-giao-vien/delete/'.$dsgv->Ma_giao_vien.'"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="quan-ly-giao-vien/'.$dsgv->Ma_giao_vien.'">Sửa</a></td>
                        </tr>';
            }
        }
    }
}
