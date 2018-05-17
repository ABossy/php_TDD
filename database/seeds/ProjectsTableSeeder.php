<?php

use Illuminate\Database\Seeder;
Use Faker\Factory as Faker;
use bheller\ImagesGenerator\ImagesGeneratorProvider;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Project');

        for($i = 1; $i < 10; $i++){
            DB::table('projects')->insert([
                'title' => $faker->sentence(),
                'image'=>('https://images.unsplash.com/photo-1490535004195-099bc723fa1f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=53d16e51c95625168dde435dbd0aaa45&auto=format&fit=crop&w=1480&q=80'),
                'content' => implode($faker->paragraphs(5)),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        } 
    }
}
