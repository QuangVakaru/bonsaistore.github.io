<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'eamil',  'password',  'name','phone'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'dmin';
 	
 	
}