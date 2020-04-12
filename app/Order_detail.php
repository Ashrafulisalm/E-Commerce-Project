<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $fillable=[
        'order_id','product_name','product_price','product_quantity'
    ];

    //public function detail(){
    //    return $this->hasMany(Order::class);
    //}
}
