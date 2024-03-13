<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/Intervention.php";
include_once "$racine/modele/Technicien.php";

include "$racine/vue/entete.html.php";


$Intervention = new Intervention();

// $interventionsTechnicien = $Intervention->getTechnicienInterventions($_SESSION['userNum']);
$interventionsTechnicien = $Intervention->getTechnicienInterventions(3);

var_dump($_SESSION);
// echo '<pre>';
// print_r($interventionsTechnicien);
// echo '</pre>';


include "$racine/vue/vueListeInterventionsTechnicien.php";

include "$racine/vue/pied.html.php";
?>