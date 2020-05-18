<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\System\Inbox;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Inbox::class, function (Faker $faker, $attrib) {
    return [
        'email' => $faker->email,
        'name' => $faker->name,
        'message' => $faker->paragraph(),
        'seen' => rand(0,1),
        'created_at' => Carbon::now()->subDays(rand(0,60))
    ];
});
