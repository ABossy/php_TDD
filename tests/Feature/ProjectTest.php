<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    // Test du statut http 
    public function testBasicTest()
    {
        $response = $this->get('/1');

        $response->assertStatus(200);
    } 

    // permet de valider la présence d'une balise h1 dans le code html. 
    public function testTitre()
    {
        $response = $this->get('/project');
        $value="<h1>Liste des Projets</h1>";
        $response->assertSee($value);
        
    }


}
