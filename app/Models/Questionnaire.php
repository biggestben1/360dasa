<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Support\Str;

/**
 * Class Questionnaire
 * @package App\Models
 * @version October 27, 2020, 10:26 am UTC
 *
 * @property bigInteger id
 * @property bigInteger user_id
 * @property string title
 * @property string purpose
 */
class Questionnaire extends Model
{

    public $table = 'questionnaires';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'id',
        'user_id',
        'title',
        'purpose'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'purpose' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    public function path()
    {
        return url('/questionnaires/'. $this->id );
    }

    public function publicPath()
    {
        return url('/surveys/'. $this->id.'-'.Str::slug($this->title) );
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
