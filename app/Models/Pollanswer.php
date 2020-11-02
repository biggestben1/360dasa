<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Pollanswer
 * @package App\Models
 * @version October 29, 2020, 12:34 pm UTC
 *
 * @property bigInteger question_id
 * @property string answer
 */
class Pollanswer extends Model
{

    public $table = 'pollanswers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'pollquestion_id',
        'answer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'answer' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function pollquestion()
    {
    return $this->belongsTo(Pollquestion::class) ;
    }

    public function pollresponses(){
        return $this->hasMany(PollsurveyResponse::class);
    }
}
