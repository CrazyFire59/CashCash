<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/connexion.inc.php";

$connexionModel->logout();

include "$racine/controleur/connexion.php";
echo "Vous avez bien été déconnecté.";


?>