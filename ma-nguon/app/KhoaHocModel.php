<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhoaHocModel extends Model
{
    protected $table = 'khoa_hoc';
    protected $primaryKey = 'Ma_khoa_hoc';
    public $timestamps = false;
}
