<?php

namespace App\Repositories;

use App\Models\Pollsurvey;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PollsurveyRepository
 * @package App\Repositories
 * @version October 29, 2020, 12:36 pm UTC
 *
 * @method Pollsurvey findWithoutFail($id, $columns = ['*'])
 * @method Pollsurvey find($id, $columns = ['*'])
 * @method Pollsurvey first($columns = ['*'])
*/
class PollsurveyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'questionnaire_id',
        'name',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pollsurvey::class;
    }
}
