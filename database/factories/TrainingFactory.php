<?php
use App\Training;
use App\User;
use Faker\Generator as Faker;

$factory->define(Training::class, function (Faker $faker) {
    $admins = User::where('permession' , 0)->orWhere('permession' ,1)->get();
    $imgs = [
        'PHP'=>'php.png' ,
        'JAVA' => 'java.jpg' ,
        'IOS'=>'swift.png' , 
        'AI' => 'AI.jpg',
        'Back End' => 'backend.png',
        'Front End' => 'front end.png',];
         $trainingKEY = array_rand($imgs , 1);
    return [
        'title' => $trainingKEY,
        'company' => $faker->name,
        'address' => $faker->address,
        'description'=> $faker->paragraph,
        'img' => 'http://127.0.0.1:8000/img/'.$imgs[$trainingKEY],
        'added_by' => $admins[random_int(0 , count($admins)-1)]->id
    ];
});
