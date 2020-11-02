<?php

namespace App\Repositories;

use App\Models\Pollquestion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PollquestionRepository
 * @package App\Repositories
 * @version October 29, 2020, 12:15 pm UTC
 *
 * @method Pollquestion findWithoutFail($id, $columns = ['*'])
 * @method Pollquestion find($id, $columns = ['*'])
 * @method Pollquestion first($columns = ['*'])
*/
class PollquestionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'questionnaire_id',
        'question'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pollquestion::class;
    }
}
