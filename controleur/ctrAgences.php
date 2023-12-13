<?php

include_once "../modele/Bdd.php";
include_once "../modele/Agence.php";

$Agence = new Agence();

$agences = $Agence->getAllAgences();
//var_dump($agences);

//echo "<br>-----------------------<br>";
// var_dump( $agences[0]["agence_adresse"]);
//echo $agences[0]["agence_adresse"];

?>