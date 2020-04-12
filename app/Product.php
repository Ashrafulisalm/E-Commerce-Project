<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'product_name','catagory_id','subcatagory_id','brand_id','short_discription',
        'long_discription','product_image','product_price','product_size',
        'product_color','product_publication'

    ];

    public function catagory(){
        return $this->belongsTo(Catagory::class);
    }

    public function subcatagory(){
        return $this->belongsTo(Sub_catagory::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function image(){
        return $this->hasMany(Image::class);
    }
}
