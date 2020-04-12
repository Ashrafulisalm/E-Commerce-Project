<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'customer_id','shipping_id','payment_id','order_total','order_status'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function shiping(){
        return $this->belongsTo(Shiping::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function detail(){
        return $this->hasMany(Order_detail::class);
    }
}
