<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
        protected $fillable=[
            'catagory_name','discription','publication'
        ];

        public function subcatagory(){
            return $this->hasOne(Sub_catagory::class);
        }

        public function sub(){
            return $this->belongsToMany(Sub_catagory::class);
        }

}
