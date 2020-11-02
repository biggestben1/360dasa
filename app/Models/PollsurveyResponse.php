<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Pollsurvey_response
 * @package App\Models
 * @version October 29, 2020, 12:38 pm UTC
 *
 * @property bigInteger survey_id
 * @property bigInteger question_id
 * @property bigInteger answer_id
 */
class PollsurveyResponse extends Model
{

    public $table = 'pollsurvey_responses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'pollsurvey_id',
        'pollquestion_id',
        'pollanswer_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function pollsurvey()
    {
        return $this->belongsTo(Pollsurvey::class);
    }
}
