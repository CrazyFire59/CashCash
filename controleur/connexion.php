<?php
/**
 * Ce script gère la connexion et la déconnexion des utilisateurs.
 * Il vérifie si les informations de connexion sont fournies, tente de connecter l'utilisateur, et redirige vers le profil en cas de succès.
 * En cas d'échec, il affiche un message d'erreur et recharge la page de connexion.
 * Il gère également la déconnexion des utilisateurs.
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

include_once "$racine/modele/connexion.inc.php";

// Vérifie si les informations de connexion sont fournies
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Tente de connecter l'utilisateur
    $loginResult = $connexionModel->login($username, $password);

    if ($loginResult) {
        // Redirige vers le profil en cas de succès
        header("Location: ./?action=profil");
    } else {
        // Affiche un message d'erreur en cas d'échec
        $titre = "Connexion";
        include "$racine/vue/vueConnexion.php";
        echo "Nom d'utilisateur ou mot de passe incorrect.";
        include "$racine/vue/pied.html.php";
    }
} else {
    // Affiche la page de connexion si les informations ne sont pas fournies
    $titre = "Connexion";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.html.php";
}

// Gère la déconnexion
if (isset($_GET['action']) && $_GET['action'] == "logout") {
    $connexionModel->logout();
    include "$racine/controleur/deconnexion.php";
    exit();
}
?>