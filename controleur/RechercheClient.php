<?php

include_once "../modele/Bdd.php";
include_once "../modele/Clients.php";

$client = new Client();

$clients = $client->getAllClients();

include "../vue/entete.html.php";
include "../vue/vueRechercheClient.php";
include "../vue/pied.html.php"; 

?>