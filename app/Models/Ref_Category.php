<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ref_Category
 * @package App\Models
 * @version September 3, 2019, 3:12 pm UTC
 *
 * @property string name
 * @property string desc
 * @property string reward
 * @property string congratulatory_message
 * @property integer target_no_referrals
 * @property integer points_per_referral
 */
class Ref_Category extends Model
{
    use SoftDeletes;

    public $table = 'ref__categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'desc',
        'reward',
        'congratulatory_message',
        'target_no_referrals',
        'points_per_referral'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'desc' => 'string',
        'reward' => 'string',
        'congratulatory_message' => 'string',
        'target_no_referrals' => 'integer',
        'points_per_referral' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
