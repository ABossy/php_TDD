<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    // permet d'utiliser la bdd "in memory"
    use \Illuminate\Foundation\Testing\DatabaseMigrations;
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

    // Test d'une page 
    public function testpage()
    {
        $response = $this->get('/project');

        $response->assertStatus(200);

    } 

    // permet de valider la présence d'une balise h1 dans le code html. 
    public function testTitre()
    {
        $response = $this->get('/project');
        $value="<h1>";
        $response->assertSee($value);
        
    }


    // test qui permet de vérifier si le titre projet existe sans aller dans la bdd.
    public function testFactoryInMemory(){
        $factory = factory(\App\Project::class)->create();
        $response = $this->get('/project');
        $value= $factory->title;
        $response->assertSee($value);
        \dump($factory);
          
    }

    // test qui permet de verifier si le titre detailprojet (via  l'id) existe sans aller dans la bdd.
    public function testTitreProjet(){
        $factory = factory(\App\Project::class)->create();
        $response = $this->get('/project/show/'.$factory->id);
        $value= $factory->title;
        $response->assertSee($value);
        \dump($factory);

    }

}
