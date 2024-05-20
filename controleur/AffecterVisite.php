<?php
/**
 * Ce script gère l'affectation des visites pour les employés et les clients.
 * Il vérifie si l'utilisateur est authentifié et a le rôle approprié, puis affiche le formulaire d'affectation des visites.
 * Si les données du formulaire sont soumises, il tente d'affecter une visite et génère un lien pour générer un PDF de la visite affectée.
 * Si l'utilisateur n'a pas le rôle requis, il le déconnecte.
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

include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/AffecterVisite.php";

// Vérifie si l'utilisateur a le rôle approprié
if (isset($_SESSION["role"]) == 1) {
    $titre = "Affecter Visite";

    // Inclusion des vues pour l'en-tête et le formulaire d'affectation de visite
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAffecterVisite.php";

    // Vérifie si le formulaire est soumis avec toutes les données nécessaires
    if (isset($_POST['intervention_date']) && isset($_POST['intervention_heure']) && isset($_POST['client_num']) && isset($_POST['employe_num_matricule'])) {
        // Tente d'affecter une visite avec les données fournies
        if ($AffecterVisite->getAffecterVisite($_POST['intervention_date'], $_POST['intervention_heure'], $_POST['client_num'], $_POST['employe_num_matricule'])) {
            echo "Visite affectée avec succès !";
            echo '<br><a target="_blank" href="./?action=genererPDF">Générer PDF</a>';

            // Redirection vers la sélection du matériel après l'affectation de la visite
            header("Location: ./?action=selectionMateriel&client_num=" . $_POST['client_num'] . "&intervention_date=" . $_POST['intervention_date'] . "&intervention_heure=" . $_POST['intervention_heure']. "&employe_num_matricule=" . $_POST['employe_num_matricule']);
        } else {
            echo "Visite non affectée !";
        }
    }

    // Inclusion de la vue pour le pied de page
    include "$racine/vue/pied.html.php"; 
} else {
    // Redirection vers le script de déconnexion si l'utilisateur n'a pas le rôle approprié
    include "$racine/controleur/deconnexion.php";
    exit();
}
?>
