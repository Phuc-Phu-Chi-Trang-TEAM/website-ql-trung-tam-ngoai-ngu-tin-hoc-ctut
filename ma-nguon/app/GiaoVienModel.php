<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class GiaoVienModel extends Model
{
    protected $table = 'giao_vien';
    protected $primaryKey = 'Ma_giao_vien' ;
    public $timestamps = false;

    protected static function layDSGiaoVien(){
        $data = DB::table('giao_vien')
                ->join('chuyen_nganh','chuyen_nganh.Ma_chuyen_nganh','=','giao_vien.Ma_chuyen_nganh')
                ->select('Ma_giao_vien',
                        'Ten_giao_vien',
                        'giao_vien.Ma_chuyen_nganh',
                        'chuyen_nganh.Ten_chuyen_nganh',
                        'Hoc_vi')
                ->get();

        return $data;
    }

    public static function layTTGiaoVien($ma_giao_vien){
        $data = DB::table('giao_vien')
                ->join('chuyen_nganh','chuyen_nganh.Ma_chuyen_nganh','=','giao_vien.Ma_chuyen_nganh')
                ->where('Ma_giao_vien',$ma_giao_vien)
                ->select('Ma_giao_vien',
                        'Ten_giao_vien',
                        'Ngay_sinh',
                        'Noi_sinh',
                        'CMND',
                        'giao_vien.Ma_chuyen_nganh',
                        'chuyen_nganh.Ten_chuyen_nganh',
                        'Hoc_vi',
                        'Dia_chi',
                        'Dien_thoai',
                        'Email',
                        'Ghi_chu')
                ->get();

        return $data;
    }
}
