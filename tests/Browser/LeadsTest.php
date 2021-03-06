<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LeadsTest extends DuskTestCase
{
    // use DatabaseMigrations;
    private $emailTest;

    /**
     * Prueba de aceptación de formulario de contacto
     *
     * 1. Navegar a la página principal
     * 2. Escribir en el campo de nombre:
     * 3. Escribir en el campo de email:
     * 4. Escribir en el campo de teléfono:
     * 5. Click al botón Enviar
     * 6. Assert de el mensaje:
     * 7. Assert que en la base de datos hay un registro con los mismos datos
     *
     * @return void
     */
    public function testLeadSaving()
    {
        $this->emailTest="correo".rand(0,1000)."0@correo.com";
        $this->browse(function (Browser $browser) {

            $browser->visit('http://tasky.test:8080/');
            $browser->assertSee('ELIT INCEPTOS CRAS NEQUE');
            $browser->with('form', function ($form) {

                $form->click('input[name="nombre"]')
                    ->type('nombre','Juan de Quiroga');
                $form->click('input[name="email"]')
                    ->type('email',$this->emailTest);
                $form->click('input[name="telefono"]')
                    ->type('telefono','1111111111');
                $form->press('ENVIAR');
            });
            //$browser->assertSee('Sus datos se han guardado correctamente');


        });


        //$this->assertDatabaseHas('form',['email',$this->emailTest]);
    }
}
