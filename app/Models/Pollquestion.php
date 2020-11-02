<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Pollquestion
 * @package App\Models
 * @version October 29, 2020, 12:15 pm UTC
 *
 * @property bigInteger questionnaire_id
 * @property string question
 */
class Pollquestion extends Model
{

    public $table = 'pollquestions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'questionnaire_id',
        'question'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'question' => 'string'
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

    public function pollanswers()
    {
        return $this->hasMany(Pollanswer::class);
    }
    public function pollresponses()
    {
        return $this->hasMany(PollsurveyResponse::class);
    }
}
