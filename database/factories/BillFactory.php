<?php

use Faker\Generator as Faker;
use App\Bill; 
$factory->define(App\Bill::class, function (Faker $faker) {
    return [
        'created_at'=>$faker->dateTimeBetween(1990),
        'user_id'=>App\User::all()->random()->id,
        'cat_id'=>App\Expense_categories::all()->random()->id,
        'amount'=>rand(10, 12000),


    ];
});
