<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = "order_products";

    protected $fillable = [
        'order_id',
        'product_id',
        'product_amount',
    ];

    public function productRelship(){
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

}
