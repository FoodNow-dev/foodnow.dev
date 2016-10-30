<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'image' => $faker->imageUrl($width = 850, $height = 400),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Models\Restaurant::class, function (Faker\Generator $faker) {
	return [
		'place_id' => '3db637d7a0e4c30950d639632068790c13e9f298'
	];
});

$factory->define(App\Models\Friend::class, function (Faker\Generator $faker) {
	$user_id = App\User::all()->random()->id;
	$friend = App\User::all()->random()->id;
	return [
		'user_id' => $user_id,
		'friend_id' => $friend,
		'action_id' => $user_id,
		'status' => $faker->numberBetween($min = 0, $max = 3)
	];
});

$factory->define(App\Models\Review::class, function (Faker\Generator $faker) {
	return [
		'created_by' => App\User::all()->random()->id,
		'rest_id' => App\Models\Restaurant::all()->random()->id,
		'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		'score' => $faker->numberBetween($min = 1, $max = 5),
		'price' => $faker->numberBetween($min = 1, $max = 4)
	];
});

$factory->define(App\Models\Favorite::class, function (Faker\Generator $faker) {
	return [
		'user_id' => App\User::all()->random()->id,
		'rest_id' => App\Models\Restaurant::all()->random()->id
	];
});



