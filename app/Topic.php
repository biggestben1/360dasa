<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'topics','user_id','total'
    ];

    public static $register_validation_rules = [
        'topic' => 'required|max:255',
        'user_id' => 'required|'

    ];
    //
    public function user()
    {
        return $this->hasMany('User');
    }
    public function Questtions()
    {
        return $this->hasMany('questtions');
    }

    public function Answer()
    {
        return $this->hasMany('App\Answer');
    }


}
