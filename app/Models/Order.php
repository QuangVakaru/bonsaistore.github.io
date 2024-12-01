<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'customer_id', 'shipping_id','coupon_id', 'status','create_at','total','update_at'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'orders';

 
}
