<?php

use Faker\Generator as Faker;

$factory->define(App\Expense::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'amount' => $faker->numberBetween( 100, 9000 ),
        'monthly' => $faker->boolean,
        'user_id' => 1,
        'catergory_id' => $faker->numberBetween( 1, 10 ),
    ];
});
