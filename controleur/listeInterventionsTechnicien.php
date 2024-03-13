<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/Intervention.php";
include_once "$racine/modele/Technicien.php";

$titre = "Intervention Technicien";

include "$racine/vue/entete.html.php";


$Intervention = new Intervention();

// $interventionsTechnicien = $Intervention->getTechnicienInterventions($_SESSION['userNum']);
$interventionsTechnicien = $Intervention->getTechnicienInterventions(3);

//var_dump($_SESSION);
// print_r($interventionsTechnicien);
// echo 'materiel_num_serie ----------';
// print_r($interventionsTechnicien[0]["materiel_num_serie"]);
// echo 'tempsPasse ----------';
// print_r($interventionsTechnicien[0]["tempsPasse"]);
// echo '</pre>';


include "$racine/vue/vueListeInterventionsTechnicien.php";

include "$racine/vue/pied.html.php";
?>