<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'product_id','order_id', 'product_name','price','quantity_sell','feeship','create_at','update_at','form'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'orderdetail';

 	public function product(){
 		return $this->belongsTo('App\Product','id');
 	}
}
