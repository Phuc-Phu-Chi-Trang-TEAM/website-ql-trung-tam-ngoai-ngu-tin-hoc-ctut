<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class GiangDayModel extends Model
{
    protected $table = 'giang_day';
    protected $primaryKey = 'Ma_lop_hoc' ;
    public $timestamps = false;

    public static function layDSGiangDay(){
        $data = DB::table('giang_day')
                ->join('lop_hoc','lop_hoc.Ma_lop_hoc','=','giang_day.Ma_lop_hoc')
                ->join('giao_vien','giao_vien.Ma_giao_vien','=','giang_day.Ma_giao_vien')
                ->select('giang_day.Ma_lop_hoc','lop_hoc.Ten_lop_hoc','giang_day.Ma_giao_vien','giao_vien.Ten_giao_vien')
                ->get();

        return $data;
    }

    public static function layMaGVGD ($ma_lop_hoc){
        $data = DB::table('giang_day')
                ->where('Ma_lop_hoc','=',$ma_lop_hoc)
                ->select('Ma_giao_vien')
                ->first();

        return $data;
    }

    public static function layDSLopHocChuaPhanCong(){
        $data = DB::table('giang_day')
                ->join('lop_hoc','lop_hoc.Ma_lop_hoc','=','giang_day.Ma_lop_hoc')
                ->where('Ma_giao_vien','=',0)
                ->whereDate('lop_hoc.Ngay_be_giang','>',now())
                ->select('giang_day.Ma_lop_hoc','lop_hoc.Ten_lop_hoc')
                ->get();

        return $data;
    }

    public static function layDSLHTheoChungChi($ma_chung_chi){
        $data = DB::table('giang_day')
                ->join('lop_hoc','lop_hoc.Ma_lop_hoc','=','giang_day.Ma_lop_hoc')
                ->where('Ma_giao_vien','=',0)
                ->where('lop_hoc.Ma_chung_chi','=',$ma_chung_chi)
                ->whereDate('lop_hoc.Ngay_be_giang','>',now())
                ->select('giang_day.Ma_lop_hoc','lop_hoc.Ten_lop_hoc')
                ->get();

        return $data;
    }
}
