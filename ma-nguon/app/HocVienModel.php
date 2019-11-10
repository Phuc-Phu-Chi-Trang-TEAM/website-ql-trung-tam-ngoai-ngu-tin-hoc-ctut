<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class HocVienModel extends Model
{
    protected $table = 'hoc_vien';
    protected $primaryKey = 'Ma_hoc_vien' ;
    public $timestamps = false;

    public static function layMaHocVienLonNhat(){
        $ma_hv_lon_nhat = DB::table('hoc_vien')->max('Ma_hoc_vien');
        $ma_hv = $ma_hv_lon_nhat;

        $data = DB::table('hoc_vien')
                ->where('Ma_hoc_vien','=',$ma_hv)
                ->first();

        return $data;
    }

    public static function layThongTinHocVien($ma_hoc_vien){
        $data = DB::table('hoc_vien')
                ->join('hoc_lop','hoc_lop.Ma_hoc_vien','=','hoc_vien.Ma_hoc_vien')
                ->join('lop_hoc','lop_hoc.Ma_lop_hoc','=','hoc_lop.Ma_lop_hoc')
                ->where('hoc_vien.Ma_hoc_vien','=',$ma_hoc_vien)
                ->select('hoc_vien.Ma_hoc_vien',
                        'hoc_vien.Ten_hoc_vien',
                        'hoc_vien.Ngay_sinh',
                        'hoc_vien.Noi_sinh',
                        'hoc_vien.CMND',
                        'hoc_vien.Dia_chi',
                        'hoc_vien.Ghi_chu',
                        'hoc_vien.Email',
                        'hoc_vien.Dien_thoai',
                        'hoc_lop.Ma_lop_hoc',
                        'lop_hoc.Ten_lop_hoc')
                ->get();
        
        return $data;
    }

    public static function layDSHocVien($ma_lop_hoc){
        $data = DB::table('hoc_vien')
                ->join('hoc_lop','hoc_lop.Ma_hoc_vien','=','hoc_vien.Ma_hoc_vien')
                ->join('lop_hoc','lop_hoc.Ma_lop_hoc','=','hoc_lop.Ma_lop_hoc')
                ->where('hoc_lop.Ma_lop_hoc','=',$ma_lop_hoc)
                ->select('hoc_vien.Ma_hoc_vien',
                        'hoc_vien.Ten_hoc_vien',
                        'hoc_lop.Ma_lop_hoc',
                        'lop_hoc.Ten_lop_hoc',
                        'hoc_vien.Ngay_sinh')
                ->get();
                
        return $data;
    }
}
