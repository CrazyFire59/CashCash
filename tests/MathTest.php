<?php

use cashcash\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{

    public function testDouble(){
        $this->assertEquals(4, Math::double(2));
        //ou 
        //$this->assertEquals(4, \cashcash\Math::double(2));
    }

}