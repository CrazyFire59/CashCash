<?php

/**
 * Ce script gère la validation d'une intervention par un technicien.
 * Il récupère les détails de l'intervention spécifique à valider,
 * affiche un formulaire pour saisir les informations de validation pour chaque matériel utilisé lors de l'intervention,
 * et met à jour la base de données avec les informations de validation saisies.
 * 
 * @package    CashCash
 * @subpackage Controleur
 * @version    1.0
 * @since      2024-05-20
 */

// Vérifie si le script est appelé directement
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// Inclusion des modèles nécessaires
require_once "$racine/modele/Bdd.php";
require_once "$racine/modele/Intervention.php";
include_once "$racine/modele/Technicien.php";

// Définition du titre de la page
$titre = "Valider Intervention";

// Inclusion de l'en-tête de la page
include "$racine/vue/entete.html.php";

// Création d'une instance de la classe Intervention
$Intervention = new Intervention();

// Récupération de l'ID de l'intervention depuis les paramètres GET
$idIntervention = $_GET['interventionId'];

// Récupération de tous les matériels utilisés lors de l'intervention
$materiels = $Intervention->getAllMaterielFromIntervention($idIntervention);

// Traitement du formulaire de validation de l'intervention
if(isset($_POST['valider'])){
    foreach($materiels as $materiel){
        $commentaire = $_POST['' . $materiel["materiel_num_serie"]  . "commentaire" . ''];
        $tempsPasse = $_POST['' . $materiel["materiel_num_serie"]  . "temps" . ''];
        $numMateriel = $_POST['' . $materiel["materiel_num_serie"] . ''];
        // Validation de l'intervention pour chaque matériel
        $Intervention->ValiderIntervention($numMateriel, $idIntervention, $tempsPasse, $commentaire);
    }
    // Redirection vers la liste des interventions du technicien
    header("Location: ./?action=listeInterventionsTechnicien");
}

// Inclusion de la vue pour la validation de l'intervention
include "$racine/vue/vueValiderIntervention.php";

// Inclusion du pied de page
include "$racine/vue/pied.html.php";

?>
