<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shiping extends Model
{
    protected $fillable=[
        'customer_first_name','customer_last_name','customer_email','customer_phone','customer_city','customer_address'
    ];


}
