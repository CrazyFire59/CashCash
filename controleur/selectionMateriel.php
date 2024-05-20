<?php

/**
 * Ce script gère la sélection de matériel pour une intervention spécifique d'un client.
 * Il récupère les informations de l'intervention, affiche un formulaire pour sélectionner le nombre de matériels,
 * et un autre formulaire pour sélectionner les matériels spécifiques à ajouter à l'intervention.
 * 
 * @package    CashCash
 * @subpackage controleur
 * @version    1.0
 * @since      2024-05-20
 */

// Vérifie si le script est appelé directement
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// Inclusion des modèles nécessaires
include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/Clients.php";
include_once "$racine/modele/Intervention.php";

// Récupération des paramètres GET
$clientnum = $_GET['client_num'];
$intervention_date = $_GET['intervention_date'];
$intervention_heure = $_GET['intervention_heure'];
$employe_num_matricule = $_GET['employe_num_matricule'];

// Création d'une instance d'Intervention et récupération de l'ID de l'intervention
$intervention = new Intervention();
$idIntervention = $intervention->getNumInterventionByAll($intervention_date, $intervention_heure, $clientnum, $employe_num_matricule);

// Récupération des matériels du client
$materiels = $clientmodel->GetMaterielsClient($clientnum);

// Initialisation du nombre de matériels
$nombreMateriel = 0;

// Traitement du formulaire de validation des matériels sélectionnés
if (isset($_POST['SMValider'])) {
    $nombreMateriel = $_POST['nombreMateriel'];
    for ($i = 0; $i < $nombreMateriel; $i++) {
        $numMateriel = $_POST['materiel' . $i];
        $intervention->AjouterInterventionMateriel($numMateriel, $idIntervention[0]['intervention_id']);
    }
    // Redirection vers la page d'affectation des visites
    header("Location: ./?action=affecterVisite");
}

// Définition du titre de la page
$titre = "Selection Materiel";

// Inclusion de l'en-tête de la page
include "$racine/vue/entete.html.php";

// Affichage des formulaires en fonction des soumissions précédentes
if (isset($_POST['submit1'])) {
    $nombreMateriel = $_POST['nombreMateriel'];
    include "$racine/vue/vueSelectionMateriel.php";
} else {
    include "$racine/vue/vueNombreMateriel.php";
}

// Inclusion du pied de page
include "$racine/vue/pied.html.php";

?>
