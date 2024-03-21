<?php

use PHPUnit\Framework\TestCase;
use cashcash\Intervention;

class InterventionTest extends TestCase
{

    public function testIntervention(){
        $intervention = new Intervention();
        $this->assertEquals("abc", $intervention->interventiontest());
    }

}