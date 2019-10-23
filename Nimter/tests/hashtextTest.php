<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use Nimter\Helpers\Hashtext;

class hashtextTest extends TestCase
{
    /**
     * Function testCipher
     *
     * Función para testear el metodo de cifrado
     *
     **/
    public function testCipher()
    {
        $text = "text";
        $originalText = Hashtext::cipher($text);

        $this->assertIsString($text);
        $this->assertSame('text',Hashtext::decrypt($originalText));
    }
}
