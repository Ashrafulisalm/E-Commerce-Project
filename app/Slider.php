<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable=[
        'product_id','slider_img','slider_publication'
    ];

    public function product(){
       return $this->belongsTo(Product::class);
    }
}
