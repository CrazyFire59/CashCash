<?php

include_once "../modele/Bdd.php";
include_once "../modele/Intervention.php";

$Intervention = new Intervention();

$idIntervention = $_GET['id'];

$intervention = $Intervention->getInterventionById($idIntervention);
// var_dump($interventions);
// echo '<pre>';
// print_r($intervention);
// echo '</pre>';


?>