<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactedb extends Model
{
    protected $fillable = [
        'title','firstname', 'last_name', 'country','phonenumber','email','address','user_id','dbid'
    ];
    //
}
