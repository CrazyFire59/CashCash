<?php

use PHPUnit\Framework\TestCase;
use cashcash\Intervention;

class InterventionTest extends TestCase
{

    public function testIntervention(){
        $Intervention = new Intervention();
        $this->assertEquals("abc", $Intervention->interventiontest());
    }

    public function testGetInterventionById(){
        $Intervention = new Intervention();

        $intervention = $Intervention->getInterventionById(1);
        $this->assertEquals(2, $intervention["intervention_id"]);
    }

}