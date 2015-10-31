<?php

use Carbon\Carbon;

// Articles

$factory->define(HLS\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(8),
        'brief' => $faker->text(300),
        'extended' => $faker->text(2500),
        'published_at' => Carbon::createFromTimeStamp( $faker->dateTimeBetween( '-1 year', '+3 months' )->getTimestamp() ),
        'image_url' => rand(0,1) ? 'http://lorempixel.com/412/' . rand(160, 460) . '/business' : null
    ];
});

// Categories

$factory->define(HLS\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word
    ];
});

// Enquiries

$factory->define(HLS\Enquiry::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'job-title' => $faker->catchPhrase,
        'phone-number' => $faker->phoneNumber,
        'comment' => $faker->realText(50),
    ];
});

// Events

$factory->define(HLS\Event::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(5),
        'brief' => $faker->text(100),
        'extended' => $faker->text(400),
        'date' => Carbon::createFromTimeStamp( $faker->dateTimeBetween( '-1 year', '+1 year' )->getTimestamp() ),
        'image_url' => 'http://lorempixel.com/440/337/' . (rand(0,1) ? 'business' : 'city'),
        'training' => rand(1,3) == 1,
    ];
});


// Member Requests

$factory->define(HLS\MemberRequest::class, function (Faker\Generator $faker) {
    return [
        'salutation' => rand(0, 6),
        'name' => $faker->name,
        'email' => $faker->email,
        'job-title' => $faker->catchPhrase,
        'company-name' => $faker->company,
        'phone-number' => $faker->phoneNumber,
        'comment' => $faker->realText(50),
    ];
});

// Users

$factory->define(HLS\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
