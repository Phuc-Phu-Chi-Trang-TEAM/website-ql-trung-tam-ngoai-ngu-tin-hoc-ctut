<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuoiHocModel extends Model
{
    protected $table = 'buoi_hoc';
    protected $primaryKey = 'Ma_buoi_hoc';
    public $timestamps = false;
}
