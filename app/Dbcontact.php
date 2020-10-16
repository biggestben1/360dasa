<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dbcontact extends Model
{
    //
    protected $fillable = [
        'title','content','user_id'
    ];
}
