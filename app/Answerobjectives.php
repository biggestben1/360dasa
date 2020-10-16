<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answerobjectives extends Model
{
    //
    protected $fillable = [
'name','country','phonenumber','email','description','objective_id'
];
    //

    public function objective()
    {
        return $this->belongsTo('App\Objective');
    }
}
