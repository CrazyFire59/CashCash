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
    
    $Intervention->editIntervention($idIntervention, 
        $date_intervention, $heure_intervention, $technicien_intervention,
    );

    foreach($materielsOfIntervention as $materiel){
        $materiel_type_id = $_POST["materiel_type" . $materiel["materiel_num_serie"]];
        $materiel_emplacement = $_POST["materiel_emplacement" . $materiel["materiel_num_serie"]];
        //on crée un objet DateTime en utilisant createFromFormat ( DateTime::createFromFormat('Y-m-d', date) )
        $materiel_date_vente = DateTime::createFromFormat('Y-m-d', $_POST["materiel_date_vente" . $materiel["materiel_num_serie"]]);
        $materiel_date_installation = DateTime::createFromFormat('Y-m-d', $_POST["materiel_date_installation" . $materiel["materiel_num_serie"]]);
        $materiel_prix_vente = $_POST["materiel_prix_vente" . $materiel["materiel_num_serie"]];

        // echo "---materiel_emplacement---<br/>";
        // echo $materiel_emplacement."<br/>";
        // echo "---materiel_date_vente---<br/>";
        // echo $materiel_date_vente."<br/>";

        //on définit l'heure sur 00:00:00 ( setTime(0, 0, 0) ) et en meme temps on formate la date ( format('Y-m-d H:i:s') )
        // echo $materiel_date_vente->setTime(0, 0, 0)->format('Y-m-d H:i:s')."<br/>";

        //on définit l'heure sur 00:00:00 ( setTime(0, 0, 0) ) et en meme temps on formate la date ( format('Y-m-d H:i:s') )
        $Materiel->editMateriel($materiel["materiel_num_serie"], 
            $materiel_emplacement, $materiel_date_vente->setTime(0, 0, 0)->format('Y-m-d H:i:s'), $materiel_date_installation->setTime(0, 0, 0)->format('Y-m-d H:i:s'), $materiel_prix_vente
        );
    }

}

include "./vue/vueEditIntervention.php";

include "./vue/pied.html.php";
?>