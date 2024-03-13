<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/Clients.php";

$IdClient = $_GET['clientnum'];

$titre = "Visualisation Client";

include "$racine/vue/entete.html.php";
include "$racine/vue/vueVisualiserClient.php";
include "$racine/vue/pied.html.php"; //salut