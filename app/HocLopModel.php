<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocLopModel extends Model
{
    protected $table = 'hoc_lop';
    protected $primaryKey = 'Ma_hoc_vien';
    public $timestamps = false;
}
