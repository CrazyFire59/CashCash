<?php

/**
 * Ce script gère l'affichage des interventions pour un technicien donné.
 * Il inclut les modèles nécessaires, récupère les interventions du technicien en fonction de son matricule,
 * et affiche la liste des interventions via une vue dédiée.
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
include_once "$racine/modele/Intervention.php";
include_once "$racine/modele/Technicien.php";

// Définition du titre de la page
$titre = "Intervention Technicien";

// Inclusion de l'en-tête de la page
include "$racine/vue/entete.html.php";

// Création des objets Intervention et Technicien
$Intervention = new Intervention();
$Technicien = new Technicien();

// Récupération du matricule du technicien connecté
$matricule = $Technicien->getMatriculebyUsername();

// Récupération des interventions du technicien en fonction de son matricule
$interventionsTechnicien = $Intervention->getTechnicienInterventions($matricule);

// Inclusion de la vue pour afficher la liste des interventions du technicien
include "$racine/vue/vueListeInterventionsTechnicien.php";

// Inclusion du pied de page
include "$racine/vue/pied.html.php";
?>
