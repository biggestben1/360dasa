<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','firstname', 'last_name', 'gender','country','postalcode','phone_number','email','password','pics'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function topic()
    {
        return $this->belongsTo('Topic');
    }
    public function questions() {
        return $this->hasMany(Question::class);
    }
}
