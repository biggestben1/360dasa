<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    protected $fillable = [
        'topic','user_id','description','total'
    ];
    //
    public function Answerobjectives()
    {
        return $this->hasMany('App\Answerobjectives');
    }
}
