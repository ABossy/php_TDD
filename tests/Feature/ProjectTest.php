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
    public function testBasicTest()
    {
        $response = $this->get('/project');

        $response->assertStatus(200);
    } 

    // permet de valider la présence d'une balise h1 dans le code html. 
    public function testTitre()
    {
        $response = $this->get('/project');
        $value="<h1>liste des projets</h1>";
        $response->assertSee($value);
        
    }

    
}
