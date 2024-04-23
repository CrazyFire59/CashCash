<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/Clients.php";
include_once "$racine/modele/Agence.php";

$IdClient = $_GET['clientnum'];

$client = $clientmodel->AffichageClient($IdClient);
//print_r($client);  

//echo 'test';
$IdClient = $client[0]['client_num'];
$raison_sociale = $client[0]['client_raison_sociale'];
$SIREN = $client[0]['client_num_SIREN'];
$codeAPE = $client[0]['client_code_APE'];
$adresse = $client[0]['client_adresse'];
$telecopie = $client[0]['client_num_télécopie'];
$telephone = $client[0]['client_téléphone'];
$email = $client[0]['client_email'];
$agence = $client[0]['agence_num'];
$nbkm = $client[0]['nbkm_agence_client'];

$agenceListe = $agences->getAllAgencesNum();
//print_r($agenceListe);


if (isset($_POST['modifier'])) {
    $adresse = $_POST['adresse'];
    $telecopie = $_POST['numTelephonecopie'];
    $telephone = $_POST['numTelephone'];
    $email = $_POST['Email'];
    $agence = $_POST['numagence'];
    $nbkm = $_POST['nbkm'];
    

    $clientmodel->ModifierClient($IdClient, $adresse, $telecopie, $telephone, $email, $agence, $nbkm);
    header("Location: .?action=RechercheClient");
}

$titre = "Modification Client";

include "$racine/vue/entete.html.php";

include "$racine/vue/vueModifierClient.php";

include "$racine/vue/pied.html.php";
?>