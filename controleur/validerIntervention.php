<?php

require_once "./modele/Bdd.php";
require_once "./modele/Intervention.php";
include_once "./modele/Technicien.php";

$titre = "Valider Intervention";
include "./vue/entete.html.php";

$Intervention = new Intervention();

$idIntervention = $_GET['interventionId'];

$intervention = $Intervention->getInterventionById($idIntervention);
// var_dump($interventions);
// echo '<pre>';
// print_r($intervention);
// echo '</pre>';

$date = $intervention["intervention_date"];
$heure = $intervention["intervention_heure"];

$Technicien = new Technicien();
$techniciens = $Technicien->getAllTechniciens();

$techniciensDansMemeAgenceQueClient = $Technicien->getAllTechniciensInSameAgencyAsClient($intervention["agence_num"]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $date = $_POST["date"];
    $heure = $_POST["heure"];
    $numTechnicien = $_POST["numTechnicien"];

    $Intervention->editIntervention($idIntervention, $date, $heure, $numTechnicien);


}

include "./vue/vueValiderIntervention.php";

include "./vue/pied.html.php";

?>