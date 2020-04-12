<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable = array(
        'admin_name','admin_email','admin_password','admin_phone',
    );
}
