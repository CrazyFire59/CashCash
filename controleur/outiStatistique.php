<?php

/**
 * Ce script gère l'affichage de l'outil statistique pour les utilisateurs ayant le rôle d'Assistant.
 * Il détermine le rôle de l'utilisateur connecté, affiche les statistiques mensuelles pour les assistants,
 * et redirige les autres rôles vers la page de connexion.
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

// Inclusion du modèle de statistiques
include_once "$racine/modele/OutilStat.inc.php";

// Détermination du rôle de l'utilisateur connecté
if (isset($_SESSION["role"])) {
    switch ($_SESSION["role"]) {
        case 1:
            $role = "Assistant";
            break;
        case 2:
            $role = "Agent";
            break;
        case 3:
            $role = "Technicien";
            break;
        default:
            $role = "Inconnu";
            break;
    }
} else {
    $role = "Inconnu";
}

// Affichage des statistiques pour les assistants
if ($role == "Assistant") {
    $titre = "Outil statistique";
    include "$racine/vue/entete.html.php";

    // Récupération des statistiques mensuelles
    $rechercheMA = 0;
    if (isset($_POST['month'])) {
        $rechercheMA = $_POST['month'] . '-01';
        $stat = $outilStat->getstatmois($rechercheMA);
        $moisetannee = $_POST['month'];
    } else {
        $stat = $outilStat->getstatdumois();
        $moisetannee = $outilStat->getmoisetannee();
    }

    // Inclusion de la vue pour afficher les statistiques
    include "$racine/vue/vueOutilStatistique.php";
    include "$racine/vue/pied.html.php";
} else {
    // Redirection vers la page de connexion pour les autres rôles
    $titre = "Connexion";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.html.php";
    exit();
}
?>
