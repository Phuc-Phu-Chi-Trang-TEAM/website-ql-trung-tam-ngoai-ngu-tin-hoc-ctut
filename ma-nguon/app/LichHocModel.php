<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LichHocModel extends Model
{
    protected $table = 'lich_hoc';
    protected $primaryKey = 'Ma_lich_hoc' ;
    public $timestamps = false;

    public static function xoaLichHoc($ma_lop_hoc){
        DB::table('lich_hoc')
        ->where('ma_lop_hoc',$ma_lop_hoc)
        ->delete();
    }

    public static function layDSLichGiang($thang, $nam, $ma_giao_vien){
        $data = DB::table('lich_hoc')
                ->join('lop_hoc','lop_hoc.Ma_lop_hoc','=','lich_hoc.Ma_lop_hoc')
                ->join('giang_day','giang_day.Ma_lop_hoc','=','lich_hoc.Ma_lop_hoc')
                ->join('giao_vien','giao_vien.Ma_giao_vien','=','giang_day.Ma_giao_vien')
                ->join('buoi_hoc','buoi_hoc.Ma_buoi_hoc','=','lop_hoc.Ma_buoi_hoc')
                ->whereMonth('lich_hoc.Ngay_hoc','=',$thang)
                ->whereYear('lich_hoc.Ngay_hoc','=',$nam)
                ->where('giang_day.Ma_giao_vien','=',$ma_giao_vien)
                ->select('lich_hoc.Ma_lop_hoc',
                        'lop_hoc.Ten_lop_hoc',
                        'giang_day.Ma_giao_vien',
                        'giao_vien.Ten_giao_vien',
                        'lich_hoc.Ngay_hoc',
                        'lich_hoc.Thu',
                        'lop_hoc.Ma_buoi_hoc',
                        'buoi_hoc.Ten_buoi_hoc')
                ->get();

        return $data;
    }
}
