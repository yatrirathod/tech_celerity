<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Product extends Authenticatable
{
    protected $table = 'products';

    protected $fillable = ['name' , 'price' , 'category_id','image','status'];

 //    public function Category(){
	// 	return $this->belongsTo('App\Models\Category', 'category_id', 'id');
	// }
}
