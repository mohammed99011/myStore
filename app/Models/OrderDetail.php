<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';

    public function order(){
        return $this->belongsTo(Order::class , 'order_id' ,'id');
    }
    public function items(){
        return $this->hasMany(ProductColorSize::class, 'Product_color_size_id','id');
    }
}
