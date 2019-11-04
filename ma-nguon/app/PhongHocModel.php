<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhongHocModel extends Model
{
    protected $table = 'phong_hoc';
    protected $primaryKey = 'Ma_phong_hoc';
    public $timestamps = false;
}
