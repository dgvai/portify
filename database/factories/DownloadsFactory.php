<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Utils\Download;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Download::class, function (Faker $faker) {
    return [
        'ip' => $faker->ipv4,
        'created_at' => Carbon::now()->subDays(rand(0,30))
    ];
});
