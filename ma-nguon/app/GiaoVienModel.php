<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoVienModel extends Model
{
    protected $table = 'giao_vien';
    protected $primaryKey = 'Ma_giao_vien' ;
    public $timestamps = false;
}
