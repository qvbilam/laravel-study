<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HighSpeedMacPool extends Model
{
    //
    protected $fillable = ['sn', 'mac_id','car_number','car_riage','position','status','remarks'];
}
