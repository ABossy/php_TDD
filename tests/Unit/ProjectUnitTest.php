<?php
namespace Tests\Unit;

use App\Project;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;



class ProjectUnitTest extends TestCase
{
    use RefreshDatabase;
// TEST unitaire validant la relation entre les models ​Project​ et ​User
public function testInstanceUserProject()
{
    $factory = factory(\App\Project::class,2)->create()->random(); 
    // verifie que l'auteur du projet est une instance du Model User
    $this->assertInstanceOf('App\User', $factory->user);
  

}

public function testInstanceProjectUser()
{
    $user = factory(\App\User::class)->create();
    $factory = factory(\App\Project::class)->create([
        'auth'=> $user->name,
        'user_id'=> $user->id,
        ]); 
       // verifie que le User est une instance du Model Project
        dump($user->projects);
        $this->assertInstanceOf(Collection::class, ($user->projects));
       
}



}



