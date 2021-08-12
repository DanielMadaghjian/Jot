<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'name' => $faker->name,
        'email' => $faker->email,
        'birthday' => '05/14/1988',
        'company' => $faker->company,
        'subject' => Str::random(10),
        'location' => Str::random(10),
        'description' => Str::random(1000),
        
    ];
});
