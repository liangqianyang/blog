<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AdminUser;
use Faker\Generator as Faker;

$factory->define(AdminUser::class, function (Faker $faker) {
    $phones = [15856893369, 15955632236, 15455266635];
    $phone = $faker->randomElement($phones);
    return [
        'name' => $faker->name,
        'password' => '6fcd7c2426f485a5d3939d3590e09965', // 123456
        'email' => $faker->unique()->safeEmail,
        'phone' => $phone,
        'status' => 1,
        'create_user_id' => 1,
        'created_at' => time(),
        'updated_at' => time(),
    ];
});
