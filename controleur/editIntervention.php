<?php

/**
 * Ce script gère la modification d'une intervention. Il récupère les détails de l'intervention, 
 * les matériels associés et les techniciens disponibles, et permet la mise à jour des informations de l'intervention.
 * Il permet également d'ajouter ou de supprimer des matériels associés à l'intervention.
 * 
 * @package    CashCash
 * @subpackage controleur
 * @version    1.0
 * @since      2024-05-20
 */

// Inclusion des modèles nécessaires
require_once "./modele/Bdd.php";
require_once "./modele/Intervention.php";
include_once "./modele/Technicien.php";
include_once "./modele/Materiel.php";

// Définition du titre de la page
$titre = "Modifier Intervention";
include "./vue/entete.html.php";

// Création de l'objet Intervention et récupération de l'intervention par ID
$Intervention = new Intervention();
$idIntervention = $_GET['interventionId'];
$intervention = $Intervention->getInterventionById($idIntervention);

// Récupération des matériels associés à l'intervention
$Materiel = new Materiel();
$materielsOfIntervention = $Materiel->getInterventionMateriels($idIntervention);

// Récupération de tous les types de matériels
$allMaterielsType = $Materiel->getAllMaterielsType();

// Récupération de tous les techniciens
$Technicien = new Technicien();
$techniciens = $Technicien->getAllTechniciens();

// Récupération des techniciens dans la même agence que le client
$techniciensDansMemeAgenceQueClient = $Technicien->getAllTechniciensInSameAgencyAsClient($intervention["agence_num"]);

// Récupération de tous les matériels du client
$allMaterielsOfClient = $Materiel->getAllMaterielsOfClient($intervention["client_num"]);

// Initialisation des détails de l'intervention
$date_intervention = $intervention["intervention_date"];
$heure_intervention = $intervention["intervention_heure"];
$technicien_intervention = $intervention["employe_num_matricule"];

// Traitement de la modification de l'intervention
if (isset($_POST['modifier'])) {
    $date_intervention = $_POST["date"];
    $heure_intervention = $_POST["heure"];
    $technicien_intervention = $_POST["numTechnicien"];
    
    $Intervention->editIntervention($idIntervention, 
        $date_intervention, $heure_intervention, $technicien_intervention
    );
    // Rafraîchissement de la page
    header("Location: ?action=editIntervention&interventionId=" . $idIntervention);
}

// Traitement de la suppression des matériels associés à l'intervention
foreach($materielsOfIntervention as $materiel) {
    if (isset($_POST['supprimer' . $materiel["materiel_num_serie"]])) {
        $Materiel->deleteMateriel($materiel["materiel_num_serie"], $idIntervention);
        // Rafraîchissement de la page
        header("Location: ?action=editIntervention&interventionId=" . $idIntervention);
    }
}

// Traitement de l'ajout de nouveaux matériels à l'intervention
if (isset($_POST['add'])) {
    $materiel_num_serie = $_POST['materiel_num_serie'];
    $Materiel->addMateriel($materiel_num_serie, $idIntervention);
    // Rafraîchissement de la page
    header("Location: ?action=editIntervention&interventionId=" . $idIntervention);
}

// Inclusion de la vue pour la modification de l'intervention
include "./vue/vueEditIntervention.php";

// Inclusion de la vue pour le pied de page
include "./vue/pied.html.php";
?>
