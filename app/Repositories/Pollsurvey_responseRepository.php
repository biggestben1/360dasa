<?php

namespace App\Repositories;

use App\Models\Pollsurvey_response;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Pollsurvey_responseRepository
 * @package App\Repositories
 * @version October 29, 2020, 12:38 pm UTC
 *
 * @method Pollsurvey_response findWithoutFail($id, $columns = ['*'])
 * @method Pollsurvey_response find($id, $columns = ['*'])
 * @method Pollsurvey_response first($columns = ['*'])
*/
class Pollsurvey_responseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'survey_id',
        'question_id',
        'answer_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pollsurvey_response::class;
    }
}
