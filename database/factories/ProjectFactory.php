<?php

use Faker\Generator as Faker;



$factory->define(App\Project::class, function ($faker) {
    $user= factory(App\User::class)->create();
    return [
        'title' => $faker->sentence(),
        'image'=>('https://images.unsplash.com/photo-1508163223045-1880bc36e222?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ff0cb0a7ffd2e11c7bfb064b1229babc&auto=format&fit=crop&w=1351&q=80'),
        'content' => implode($faker->paragraphs(5)),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
        'user_id'=> $user->id,
        'auth'=>$user->name
    ];
});