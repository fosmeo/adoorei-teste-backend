<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Models\OrderProduct;

class Order extends Model
{
    use HasFactory;
    
    protected $table = "orders";
    protected $fillable = [
        'user_id',
        'order_status',
        'order_total',
    ];

    public function orderProductRelship(){
        return $this->hasMany('App\Models\OrderProduct');
    }
    // public function userRelship(){
    //     return $this->belongsTo('App\Models\User', 'user_id', 'id');
    // }
}
