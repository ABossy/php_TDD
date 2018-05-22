<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ProjectTest extends TestCase
{
    // permet d'utiliser la bdd "in memory"
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */


    // Test du statut http 
    public function testBasicTest()
    {
        $response = $this->get('/welcome');

        $response->assertStatus(200);

    } 

    // Test d'une page statut http
    public function testPage()
    {
        $response = $this->get('/project');

        $response->assertSuccessful();
     

    } 

    // permet de valider la présence d'une balise h1 dans le code html. 
    public function testTitre()
    {
        $response = $this->get('/project');
        $value="<h1>";
        $response->assertSee($value);
        
    }

     // TEST validant la présence du titre “Liste des projets” 
     public function testTitre2()
     {
         $response = $this->get('/project');
         $value="Liste des Projets";
         $response->assertSee($value);
         
     }


    // TEST validant la présence du titre d’un projet sur la page de liste des projets.
    public function testFactoryInMemory()
    {
        $factory = factory(\App\Project::class)->create();
        $response = $this->get('/project');
        $value= $factory->title;
        $response->assertSee($value);
        
          
    }

    // TEST validant la présence du titre d’un projet sur la page de détails d’un projet
    public function testTitreProjet()
    {
        $factory = factory(\App\Project::class)->create();
        $response = $this->get('/project/show/'.$factory->id);
        $value= $factory->title;
        $response->assertSee($value);
        

    }

    // TEST unitaire validant la relation entre les models ​Project​ et ​User
    public function testModelUserProject()
    {
        $factory = factory(\App\Project::class,2)->create()->random(); 
        $response = $this->get('/project/show/'.$factory->id);
        $value= $factory->user->email;
        dump($value);
        $response->assertSee($value); 
 
    }

    // TEST qui permet de verifier le nom de l'auteur sur un projet
    public function testAuthorProject()
    {
        $factory = factory(\App\Project::class,3)->create()->random(); 
        $response = $this->get('/project/show/'.$factory->id);
        $value= $factory->auth;
        dump($value);
        $response->assertSee($value); 
 
    }

}
