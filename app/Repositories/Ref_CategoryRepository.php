<?php

namespace App\Repositories;

use App\Models\Ref_Category;
use App\Repositories\BaseRepository;

/**
 * Class Ref_CategoryRepository
 * @package App\Repositories
 * @version September 3, 2019, 3:12 pm UTC
*/

class Ref_CategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'desc',
        'reward',
        'congratulatory_message',
        'target_no_referrals',
        'points_per_referral'
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
        return Ref_Category::class;
    }
}
