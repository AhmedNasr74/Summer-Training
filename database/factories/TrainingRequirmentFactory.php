<?php

use Faker\Generator as Faker;

$factory->define(App\TrainingRequirments::class, function (Faker $faker) {
    $trs = \App\Training::get();
    return [
        'requirment' => $faker->sentence,
        'training_id' => $trs[random_int(0,count($trs)-1)]->id
    ];
});
