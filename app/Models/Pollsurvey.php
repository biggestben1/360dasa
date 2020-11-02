<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Pollsurvey
 * @package App\Models
 * @version October 29, 2020, 12:36 pm UTC
 *
 * @property bigInteger questionnaire_id
 * @property string name
 * @property string email
 */
class Pollsurvey extends Model
{

    public $table = 'pollsurveys';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'questionnaire_id',
        'name',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function pollresponses()
    {
        return $this->hasMany(PollsurveyResponse::class);
    }

}
