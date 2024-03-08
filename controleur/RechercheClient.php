<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/Clients.php";

$client = new Client();

$clients = $client->getAllClients();

include "$racine/vue/entete.html.php";
include "$racine/vue/vueRechercheClient.php";
include "$racine/vue/pied.html.php"; 

?>