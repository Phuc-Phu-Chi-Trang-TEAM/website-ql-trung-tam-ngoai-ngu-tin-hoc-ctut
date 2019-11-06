<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LopHocModel extends Model
{
    protected $table = 'lop_hoc';
    protected $primaryKey = 'Ma_lop_hoc' ;
    public $timestamps = false;
}
