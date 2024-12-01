<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProductModel extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'meta_keywords', 'name', 'slug','describe','status', 'create_at','update_at'
    ];
    protected $primaryKey = 'category_id';
 	protected $table = 'category';
}
