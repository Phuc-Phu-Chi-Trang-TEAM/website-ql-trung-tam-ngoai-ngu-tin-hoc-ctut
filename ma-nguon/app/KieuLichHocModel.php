<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KieuLichHocModel extends Model
{
    protected $table = 'kieu_lich_hoc';
    protected $primaryKey = 'Ma_kieu_lich_hoc' ;
    public $timestamps = false;
}
