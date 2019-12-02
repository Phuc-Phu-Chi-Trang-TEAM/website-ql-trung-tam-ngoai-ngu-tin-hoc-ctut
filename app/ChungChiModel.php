<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChungChiModel extends Model
{
    protected $table = 'chung_chi';
    protected $primaryKey = 'Ma_chung_chi';
    public $timestamps = false;
}
