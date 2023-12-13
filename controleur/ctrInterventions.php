<?php

include_once "../modele/Bdd.php";
include_once "../modele/Intervention.php";

$Intervention = new Intervention();

$interventions = $Intervention->getAllInterventions();
var_dump($interventions);

?>