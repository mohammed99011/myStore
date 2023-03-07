<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorSize extends Model
{
    use HasFactory;

    protected $table = 'product_color_size';

    public function images(){
        return $this->hasMany(ProductImage::class , 'product_color_size_id', 'id');
    }


    public function productColor(){
        return $this->belongsTo(ProductColor::class, 'product_color_id', 'id');
    }

    public function productSize(){
        return $this->belongsTo(ProductSize::class, 'product_size_id', 'id');
    }
}
