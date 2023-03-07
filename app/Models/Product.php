<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function category(){
        return $this->belongsTo(Category::class ,'category_id', 'id');
    }



    public function colors(){
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }

    public function sizes(){
        return $this->hasMany(ProductSize::class, 'product_id', 'id');
    }


}
