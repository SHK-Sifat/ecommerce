<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function category(){
      return $this->belongsTo('App\Models\ProductCategory','product_categori','procate_id');
    }

    public function proType(){
      return $this->belongsTo('App\Models\ProductType','protype','protype_id');
    }
}
