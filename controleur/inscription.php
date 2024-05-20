<?php

/**
 * Ce script gère l'inscription des utilisateurs. Il vérifie si l'utilisateur a le rôle approprié, 
 * puis affiche le formulaire d'inscription et traite les données soumises pour inscrire un nouvel utilisateur.
 * Si l'utilisateur est déjà inscrit, un message d'erreur est affiché. Sinon, l'inscription est effectuée et confirmée.
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

// Vérifie si l'utilisateur a le rôle approprié pour accéder à cette page
if (isset($_SESSION['role']) == 4) {
    include_once "$racine/modele/inscription.inc.php";

    // Vérifie si le formulaire d'inscription est soumis
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $matricule = $_POST['matricule'];
        $role = $_POST['role'];

        // Vérifie si l'utilisateur ou le matricule existe déjà
        if ($inscription->dejaInscrit($username, $matricule)) {
            $inscriptionResult = false;
        } else {
            // Inscrit le nouvel utilisateur
            $inscription->inscription($username, $password, $matricule, $role);
            $titre = "Inscription";
            include "$racine/vue/entete.html.php";
            include "$racine/vue/vueInscription.php";
            echo "Inscription de l'utilisateur " . $username . " réussie.";
            include "$racine/vue/pied.html.php";
        }

        // Affiche un message si l'utilisateur existe déjà
        if ($inscriptionResult == false) {
            $titre = "Inscription";
            include "$racine/vue/entete.html.php";
            include "$racine/vue/vueInscription.php";
            echo "L'utilisateur existe déjà.";
            include "$racine/vue/pied.html.php";
        }
    } else {
        // Affiche le formulaire d'inscription
        $titre = "Inscription";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/vueInscription.php";
        include "$racine/vue/pied.html.php";
    }
} else {
    // Redirige vers la page d'accueil si l'utilisateur n'a pas le rôle approprié
    header("Location: $racine/index.php");
}
?>
