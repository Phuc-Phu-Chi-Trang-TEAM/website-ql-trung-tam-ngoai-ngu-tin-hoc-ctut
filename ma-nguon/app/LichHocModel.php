<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichHocModel extends Model
{
    protected $table = 'lich_hoc';
    protected $primaryKey = 'Ma_lich_hoc' ;
    public $timestamps = false;
}
