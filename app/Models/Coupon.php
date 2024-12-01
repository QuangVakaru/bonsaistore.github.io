<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'coupon_name', 'time', 'number','value', 'code','create_at','update_at'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'coupon';
}
