<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ref_Category;
use Faker\Generator as Faker;

$factory->define(Ref_Category::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'desc' => $faker->text,
        'reward' => $faker->word,
        'congratulatory_message' => $faker->word,
        'target_no_referrals' => $faker->randomDigitNotNull,
        'points_per_referral' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
