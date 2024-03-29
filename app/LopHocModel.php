<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LopHocModel extends Model
{
    protected $table = 'lop_hoc';
    protected $primaryKey = 'Ma_lop_hoc' ;
    public $timestamps = false;

    public static function layDSLopHocChuaKetThuc(){
        $data = DB::table('lop_hoc')
                ->whereDate('Ngay_be_giang','>',now())
                ->get();

        return $data;
    }

    public static function lienKetDuLieu($id){
        $data = DB::table('lop_hoc')
                ->join('khoa_hoc','khoa_hoc.Ma_khoa_hoc','=','lop_hoc.Ma_khoa_hoc')
                ->join('chung_chi','chung_chi.Ma_chung_chi','=','lop_hoc.Ma_chung_chi')
                ->join('buoi_hoc','buoi_hoc.Ma_buoi_hoc','=','lop_hoc.Ma_buoi_hoc')
                ->join('kieu_lich_hoc','kieu_lich_hoc.Ma_kieu_lich_hoc','=','lop_hoc.Ma_kieu_lich_hoc')
                ->join('phong_hoc','phong_hoc.Ma_phong_hoc','=','lop_hoc.Ma_phong_hoc')
                ->where('Ma_lop_hoc',$id)
                ->select('Ma_lop_hoc',
                        'Ten_lop_hoc',
                        'lop_hoc.Ghi_chu',
                        'So_luong_hoc_vien',
                        'lop_hoc.Ma_khoa_hoc',
                        'khoa_hoc.Ten_khoa_hoc',
                        'lop_hoc.Ma_buoi_hoc',
                        'buoi_hoc.Ten_buoi_hoc',
                        'lop_hoc.Ma_chung_chi',
                        'chung_chi.Ten_chung_chi',
                        'lop_hoc.Ma_kieu_lich_hoc',
                        'kieu_lich_hoc.Ten_kieu_lich_hoc',
                        'Ngay_khai_giang',
                        'Ngay_be_giang',
                        'lop_hoc.Ma_phong_hoc',
                        'phong_hoc.Ten_phong_hoc')
                ->get();

        return $data;
    }

    public static function layMaLopHocLonNhat(){
        $ma_lh_lon_nhat = DB::table('lop_hoc')->max('Ma_lop_hoc');
        $ma_lh = $ma_lh_lon_nhat;

        $data = DB::table('lop_hoc')
                ->where('Ma_lop_hoc','=',$ma_lh)
                ->first();

        return $data;
    }
}
