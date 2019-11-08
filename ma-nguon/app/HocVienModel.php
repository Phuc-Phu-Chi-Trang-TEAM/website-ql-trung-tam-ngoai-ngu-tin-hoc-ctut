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
}
