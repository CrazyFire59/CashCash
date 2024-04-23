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

$allMaterielsType = $Materiel->getAllMaterielsType();

$Technicien = new Technicien();
$techniciens = $Technicien->getAllTechniciens();

$techniciensDansMemeAgenceQueClient = $Technicien->getAllTechniciensInSameAgencyAsClient($intervention["agence_num"]);

$date_intervention = $intervention["intervention_date"];
$heure_intervention = $intervention["intervention_heure"];
$technicien_intervention = $intervention["employe_num_matricule"];

if (isset($_POST['modifier'])) {
    $date_intervention = $_POST["date"];
    $heure_intervention = $_POST["heure"];
    $technicien_intervention = $_POST["numTechnicien"];
    
    $Intervention->editIntervention(
        $idIntervention, $date_intervention, $heure_intervention, $technicien_intervention,
    );

    foreach($materielsOfIntervention as $materiel){
        $materiel_type_id = $_POST["materiel_type" . $materiel["materiel_type_id"]];
        $materiel_emplacement = $_POST["materiel_emplacement" . $materiel["materiel_type_id"]];
        $Materiel->editMateriel($materiel_emplacement);
    }

}

include "./vue/vueEditIntervention.php";

include "./vue/pied.html.php";
?>