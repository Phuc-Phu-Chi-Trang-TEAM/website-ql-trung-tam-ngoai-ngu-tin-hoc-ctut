<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuyenNganhModel;
use App\GiaoVienModel;
use App\LichHocModel;

class LichGiangController extends Controller
{
    public function hienThi(){
        $ds_giao_vien = GiaoVienModel::all();
        $ds_chuyen_nganh = ChuyenNganhModel::all();

        return view('xem-lich-giang',['ds_giao_vien'=>$ds_giao_vien,
                                    'ds_chuyen_nganh'=>$ds_chuyen_nganh]);
    }

    protected function loadCbxGiaoVien($ma_chuyen_nganh){
        $ds_giao_vien = GiaoVienModel::where('Ma_chuyen_nganh','=',$ma_chuyen_nganh)->get();
        echo '<option value="">Chọn giáo viên</option>';
        foreach($ds_giao_vien as $dsgv){
            echo '<option value="'.$dsgv->Ma_giao_vien.'">('.$dsgv->Ma_giao_vien.') '.$dsgv->Ten_giao_vien.'</option>';
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

    public function layDSLichGiang(Request $request){
        if ($request->btn_xem){
            $thang = $request->thang;
            $nam = $request->nam;
            $ma_giao_vien = $request->ma_giao_vien;

            $lich_giang = LichHocModel::layDSLichGiang($thang, $nam, $ma_giao_vien);
            $ds_giao_vien = GiaoVienModel::all();
            $ds_chuyen_nganh = ChuyenNganhModel::all();
            return view('xem-lich-giang',['ds_giao_vien'=>$ds_giao_vien,
                                        'ds_chuyen_nganh'=>$ds_chuyen_nganh,
                                        'lich_giang'=>$lich_giang]);
        }
    }
}
