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
        $user= factory(App\User::class)->create();

        for($i = 1; $i < 3; $i++){
            DB::table('projects')->insert([
                'auth'=> $user->name,
                'title' => $faker->sentence(),
                'image'=>('https://images.unsplash.com/photo-1508163223045-1880bc36e222?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ff0cb0a7ffd2e11c7bfb064b1229babc&auto=format&fit=crop&w=1351&q=80'),
                'content' => implode($faker->paragraphs(5)),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'user_id'=>$user->id
            ]);
        } 
    }
}
