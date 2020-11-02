<?php

namespace App\Repositories;

use App\Models\Pollanswer;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PollanswerRepository
 * @package App\Repositories
 * @version October 29, 2020, 12:34 pm UTC
 *
 * @method Pollanswer findWithoutFail($id, $columns = ['*'])
 * @method Pollanswer find($id, $columns = ['*'])
 * @method Pollanswer first($columns = ['*'])
*/
class PollanswerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'question_id',
        'answer'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pollanswer::class;
    }
}
