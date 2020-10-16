<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questtions extends Model
{
    //
    protected $fillable = [
        'description','user_id','topic_id'
    ];

    public function topic()
    {
        return $this->belongsTo('Topic');
    }
}
