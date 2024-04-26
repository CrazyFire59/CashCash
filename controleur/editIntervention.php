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
// echo count($materielsOfIntervention);
// var_dump($materielsOfIntervention);

$allMaterielsType = $Materiel->getAllMaterielsType();

$Technicien = new Technicien();
$techniciens = $Technicien->getAllTechniciens();

$techniciensDansMemeAgenceQueClient = $Technicien->getAllTechniciensInSameAgencyAsClient($intervention["agence_num"]);
 
$allMaterielsOfClient = $Materiel->getAllMaterielsOfClient($intervention["client_num"]); 
// echo '<pre>';
// print_r($allMaterielsOfClient);
// echo '</pre>';

$date_intervention = $intervention["intervention_date"];
$heure_intervention = $intervention["intervention_heure"];
$technicien_intervention = $intervention["employe_num_matricule"];

if (isset($_POST['modifier'])) {
    $date_intervention = $_POST["date"];
    $heure_intervention = $_POST["heure"];
    $technicien_intervention = $_POST["numTechnicien"];
    
    $Intervention->editIntervention($idIntervention, 
        $date_intervention, $heure_intervention, $technicien_intervention,
    );
    // refresh
    header("Location: ?action=editIntervention&interventionId=" . $idIntervention);

}


foreach($materielsOfIntervention as $materiel){

    if (isset($_POST['supprimer' . $materiel["materiel_num_serie"]])) {
        $Materiel->deleteMateriel($materiel["materiel_num_serie"], $idIntervention);
        // refresh
        header("Location: ?action=editIntervention&interventionId=" . $idIntervention);
    }
    
}



if (isset($_POST['add'])) {
    $materiel_num_serie = $_POST['materiel_num_serie'];

    $Materiel->addMateriel($materiel_num_serie, $idIntervention);
    // refresh
    header("Location: ?action=editIntervention&interventionId=" . $idIntervention);
}


include "./vue/vueEditIntervention.php";

include "./vue/pied.html.php";
?>