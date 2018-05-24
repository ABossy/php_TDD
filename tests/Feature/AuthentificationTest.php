<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Project;

class AuthentificationTest extends TestCase
{
    use RefreshDatabase;

    public function testAuthentification()
    {
        $user = factory(User::class)->create();

        //méthode d'assistance fournit un moyen simple d'authentifier un utilisateur donné en tant qu'utilisateur actuel. 
        $response = $this->actingAs($user)
        //"withSession" charge la session avec des données avant d'envoyer une requête à notre application:
                         ->withSession(['foo' => 'bar'])
                         ->get('/');
        $response->assertStatus(200);

    }

    public function testPageWithoutlogin()
    {
        $factory = factory(\App\Project::class)->create();
        $response=$this->withSession(['foo'=>'bar'])
                        ->get('/project/show/'.$factory->id);
        $response->assertStatus(200);
                      
    }

    public function testPageWithlog()
    {
        $user= factory(User::class)->create();
        $factory = factory(\App\Project::class)->create();
        $response=$this->actingAs($user)
                        ->withSession(['foo'=>'bar'])
                        ->get('/project/show/'.$factory->id);
        $response->assertStatus(200);
    }

    public function testEditProjectAsAuthor()
    {
        $user1= factory(User::class)->create();
        $user2= factory(User::class)->create();
        $factory = factory(\App\Project::class)->create([
            'auth'=> $user1->name,
            'user_id'=> $user1->id,
        ]);
        $response=$this->actingAs($user1)
                        ->withSession(['foo'=>'bar'])
                        ->get('/editproject/'.$factory->id);
        $response->assertStatus(200);
    }

    public function testEditProjectAsUser()
    {
        $this->expectException(\Exception::class);// on s'attend a avoir une exception "Erreur"
        $user1= factory(User::class)->create();
        $user2= factory(User::class)->create();
        $factory = factory(\App\Project::class)->create([
            'auth'=> $user1->name,
            'user_id'=> $user1->id,
        ]);
        $response=$this->actingAs($user2)
                        ->withSession(['foo'=>'bar'])
                        ->get('/editproject/'.$factory->id);
        $response->assertStatus(404);
    }
}