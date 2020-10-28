<?php

namespace App\Repositories;

use App\Models\Questionnaire;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class QuestionnaireRepository
 * @package App\Repositories
 * @version October 27, 2020, 10:26 am UTC
 *
 * @method Questionnaire findWithoutFail($id, $columns = ['*'])
 * @method Questionnaire find($id, $columns = ['*'])
 * @method Questionnaire first($columns = ['*'])
*/
class QuestionnaireRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'user_id',
        'title',
        'purpose'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Questionnaire::class;
    }
}
