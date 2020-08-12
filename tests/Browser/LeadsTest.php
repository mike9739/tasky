<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LeadsTest extends DuskTestCase
{
    // use DatabaseMigrations;

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
        $this->browse(function (Browser $browser) {
            $browser->visit('/');
            $browser->assertSee('faucibus donec nulla nam scelerisque ac ipsum ac penatibus');

            $browser->with('form', function ($form) {
                $form->click('input[name="nombre"]')
                    ->type('nombre', /* ... */);
                /* ... */
                $form->press(/* ... */);
                $form->waitforText(/* ... */);
            });
        });

        $this->assertDatabaseHas(/* ... */);
    }
}
