<?php

require_once "./modele/Bdd.php";
require_once "./modele/Intervention.php";
include_once "./modele/Technicien.php";
include_once "./modele/Materiel.php";

$titre = "Modifier Intervention";
include "./vue/entete.html.php";

$Intervention = new Intervention();

$idIntervention = $_GET['interventionId'];

$intervention = $Intervention->getInterventionById($idIntervention);
//var_dump($interventions);
// echo '<pre>';
// print_r($intervention);
// echo '</pre>';

$Materiel = new Materiel();
$materielsOfIntervention = $Materiel->getInterventionMateriels($idIntervention);
echo count($materielsOfIntervention);
var_dump($materielsOfIntervention);

$Technicien = new Technicien();
$techniciens = $Technicien->getAllTechniciens();

$techniciensDansMemeAgenceQueClient = $Technicien->getAllTechniciensInSameAgencyAsClient($intervention["agence_num"]);

$date = $intervention["intervention_date"];
$heure = $intervention["intervention_heure"];
$technicien = $intervention["employe_num_matricule"];

if (isset($_POST['modifier'])) {
    $date = $_POST["date"];
    $heure = $_POST["heure"];
    $technicien = $_POST["numTechnicien"];
    
    $Intervention->editIntervention(
        $idIntervention, $date, $heure, $technicien
    );
}

include "./vue/vueEditIntervention.php";

include "./vue/pied.html.php";
?>