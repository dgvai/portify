<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Utils\Visitor;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Visitor::class, function (Faker $faker) {
    return [
        'ip' => $faker->ipv4,
        'page' => 'home',
        'created_at' => Carbon::now()->subDays(rand(0,30))
    ];
});
