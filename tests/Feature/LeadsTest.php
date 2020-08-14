<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadsTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Prueba del API endpoint para guardar los lead
     *
     * 1. Enviar la información de lead a /api/lead
     * 2. Assert que la respuesta es OK
     * 3. Assert que el contenido de la respuesta json es:
     * 4. Assert que en la tabla de leads exista un registro con la información correspondiente
     *
     * @return void
     */
    public function testLeadSaving()
    {
        $emailTest="correo".rand(0,1000)."0@correo.com";
        $userData = ["nombre"=>"Juan Ramirez",
                    "email"=> $emailTest,
                    "telefono"=> "1111111111"];
        $response = $this->json('POST','/api/lead', $userData);
        $response->assertStatus(201);
        $this->assertDatabaseHas('form',['email'=> $emailTest]);

    }
}
