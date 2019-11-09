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
}
