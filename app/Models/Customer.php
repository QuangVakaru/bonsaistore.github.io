<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name', 'email', 'password','phone','create_at','update_at'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'customer';
}
