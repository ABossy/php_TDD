<?php

use Faker\Generator as Faker;



$factory->define(App\Project::class, function ($faker) {
    $user= factory(App\User::class)->create();
    return [
        'title' => $faker->title,
        'image'=>('https://images.unsplash.com/photo-1490535004195-099bc723fa1f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=53d16e51c95625168dde435dbd0aaa45&auto=format&fit=crop&w=1480&q=80'),
        'content' => implode($faker->paragraphs(5)),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
        'user_id'=> $user->id,
        'auth'=>$user->name
    ];
});