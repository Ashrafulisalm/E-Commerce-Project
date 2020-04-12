<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_catagory extends Model
{
    protected $fillable=[
        'catagory_id','subcatagory_name','publication'
    ];

    public function catagory(){
        return $this->belongsTo(Catagory::class);
    }
}
