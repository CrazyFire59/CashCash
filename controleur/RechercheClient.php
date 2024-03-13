<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/Clients.php";


$clients = $clientmodel->getAllClients();

if (isset($_POST['recherche'])) {
    $recherche = $_POST['recherche'];
    $clients = $clientmodel->rechercheClient($recherche);
}
//on a pas acces au site ?
// si moi
// lance filezilla 
//j'ai fait connexion
$titre = "Fichier Client";

include "$racine/vue/entete.html.php";
include "$racine/vue/vueRechercheClient.php";
include "$racine/vue/pied.html.php"; 

?>