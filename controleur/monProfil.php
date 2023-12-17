<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/connexion.inc.php";

// Vérifier si l'utilisateur est connecté
if ($connexionModel->isLoggedOn()) {
    //$user = getUtilisateur($_SESSION["username"]);

    
    // Si l'utilisateur est connecté, inclure les informations de profil
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueMonProfil.php";
    include "$racine/vue/pied.html.php";  
    
}else{
    // Si l'utilisateur n'est pas connecté, afficher le formulaire de connexion
    $titre = "Connexion";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.html.php";
    exit(); // Arrêter l'exécution pour afficher le formulaire de connexion
}


?>
