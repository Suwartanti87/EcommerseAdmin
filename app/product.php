<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';

     public function addOrder(){
     	return $this->hasMany('App/product');
     }
     public function getProduct(){
     	return $this->hasMany('App/product');
     }
 }