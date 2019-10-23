<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use Nimter\Helpers\Sessions;

class sessionsTest extends TestCase
{
    /**
     * Function testSessionInit
     *
     * Función que hace pruebas para revisar que se activen las sesiones
     *
     **/
    public function testSessionInit()
    {
        $this->assertSame('',session_id());
    }

    /**
     * Function testSessionGet
     *
     * Función que hace pruebas para obtener la variable de sesión
     *
     **/
    public function testSessionGet()
    {
        Sessions::set('number',1);
        Sessions::set('text','Test');

        $this->assertSame(1,Sessions::get('number'));

        $this->assertSame('Test',Sessions::get('text'));

        $this->assertSame(null,Sessions::get('numberx'));

        $this->assertSame(null,Sessions::get(''));
    }

    /**
     * Function testSessionDelete
     *
     * Función que hace pruebas para obtener la variable de sesión
     *
     **/
    public function testSessionDelete()
    {
        Sessions::set('id',1);

        $this->assertSame(1,Sessions::get('id'));

        Sessions::delete('id');

        $this->assertSame(null,Sessions::get('id'));
    }
}
