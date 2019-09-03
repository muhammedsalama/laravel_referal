<?php

namespace App\Repositories;

use App\Models\Ref_Level;
use App\Repositories\BaseRepository;

/**
 * Class Ref_LevelRepository
 * @package App\Repositories
 * @version September 3, 2019, 3:05 pm UTC
*/

class Ref_LevelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ref_Level::class;
    }
}
