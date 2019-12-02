<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuyenNganhModel extends Model
{
    protected $table = 'chuyen_nganh';
    protected $primaryKey = 'Ma_chuyen_nganh';
    public $timestamps = false;
}
