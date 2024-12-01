<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name','quantity','category_id','quantity_sell', 'slug','describe','price','image','status','form','weight','rent_price','view'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'product';
}
