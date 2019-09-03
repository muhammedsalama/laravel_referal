<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ref_Category extends Model
{
    protected $fillable = [
        'name','disc','reward','congratulatory_message','target_no_referrals','points_per_referral'
    ];
}
