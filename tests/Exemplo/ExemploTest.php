<?php

namespace Tests\Exemplo;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExemploTest extends TestCase{

    public function test_exemplo_testes()
    {        

        $response = $this->get('/');

        $response->assertStatus(200);                             

    }    
}