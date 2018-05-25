<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Project;

class AuthentificationTest extends TestCase
{
    use RefreshDatabase;

    // TEST validant qu’un utilisateur connecté peut ajouter un projet 
    public function testAuthentification()
    {
        $user = factory(User::class)->create();
        $factory = factory(\App\Project::class)->create();
        //méthode d'assistance fournit un moyen simple d'authentifier un utilisateur donné en tant qu'utilisateur actuel. 
        $response = $this->actingAs($user)
                         ->get('/');
        $response->assertStatus(200);

    }

     
     // TEST validant qu’un utilisateur non connecté ne peut pas ajouter un projet
    public function testPageWithoutlogin()
    {
        $this->expectException(\Exception::class);//je m'attend à une exception car sans login pas acces à la création.
        $response=$this->get('/creation');
                    
    }

    // (en tant que user je peux accéder à la page d'une création)
    public function testPageWithlog()
    {
        $user= factory(User::class)->create();
        $response=$this->actingAs($user)
                        ->get('/creation');
        $response->assertStatus(200);
    }

    //TEST validant que seul l’auteur d’un projet peut l’éditer 
    public function testEditProjectAsAuthor()
    {
        $factory = factory(\App\Project::class)->create();
        $response=$this->actingAs($factory->user)
                        ->get('/editproject/'.$factory->id);
        $response->assertStatus(200);
    }

    //TEST validant qu'en tant que User je ne peux pas éditer un projet. 
    public function testEditProjectAsUser()
    {
        $this->expectException(\Exception::class);// on s'attend a avoir une exception "Erreur"
        $user2= factory(User::class)->create();
        $factory = factory(\App\Project::class)->create();
        $response=$this->actingAs($user2)
                        ->get('/editproject/'.$factory->id);
        $response->assertStatus(404);
    }

    // TEST soumission du formulaire
    public function testPageCreate()
    {
        $factory = factory(\App\Project::class)->make();//genere un projet sans le mettre dans la bdd "in memory"
        $data = array(
        'auth'=>$factory->user->name,
        'title' => $factory->title,
        'image'=> $factory->image,
        'message'=> $factory->content,
        );
        $response = $this->actingAs($factory->user)
                ->post('/edit',$data);
        $this->assertEquals(302, $response->getStatusCode());
        
    }

}