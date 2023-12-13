<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/connexion.inc.php";

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["username"]) && isset($_POST["password"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
}
else
{
    $username="";
    $password="";
}

login($username,$password);

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
    include "$racine/controleur/monProfil.php";
}
else{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    $titre = "Connexion";
    include "$racine/vue/vueConnexion.php";
    
    include "$racine/vue/pied.html.php";
}

?>