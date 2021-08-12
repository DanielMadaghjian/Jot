<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'date' => '05/14/1988',
        'subject' => Str::random(10),
        'topic' => Str::random(32),
        'takeaway' => Str::random(1000),
                
    ];
});

