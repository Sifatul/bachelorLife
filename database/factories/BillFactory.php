<?php

use Faker\Generator as Faker;
use App\Bill;
use Carbon\Carbon;

$factory->define(App\Bill::class, function (Faker $faker) {
    return [
        'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        'user_id'=>21,
        'cat_id'=>App\Expense_categories::all()->random()->id,
        'amount'=>rand(10, 12000),


    ];
});

// App\User::all()->random()->id,
