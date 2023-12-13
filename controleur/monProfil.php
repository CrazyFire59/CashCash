<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/connexion.inc.php";

// récupération des données GET, POST, et SESSION
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // appel de la fonction de connexion
    login($username, $password);
}

// si l'utilisateur est connecté on redirige vers le controleur monProfil
if (isLoggedOn()) {
    include "$racine/controleur/monProfil.php";
} else {
    // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    $titre = "pas bon";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.html.php";
}
?>
