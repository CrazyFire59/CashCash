<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/Clients.php";

$IdClient = $_GET['clientnum'];

$client = $clientmodel->AffichageClient($IdClient);
var_dump($client);  

echo 'test';
$IdClient = $client['client_num'];
$raison_sociale = $client['raison_sociale'];
$SIREN = $client['SIREN'];
$codeAPE = $client['codeAPE'];
$adresse = $client['adresse'];
$telecopie = $client['telecopie'];
$codePostal = $client['codePostal'];
$telephone = $client['telephone'];
$email = $client['email'];
$agence = $client['agence_num'];
$nbkm = $client['nbkm_agence_client'];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $raison_sociale = $_POST['raison_sociale'];
    $SIREN = $_POST['SIREN'];
    $codeAPE = $_POST['client_code_APE'];
    $adresse = $_POST['client_adresse'];
    $telecopie = $_POST['client_num_télécopie'];
    $telephone = $_POST['client_téléphone'];
    $email = $_POST['client_email'];
    $agence = $_POST['agence_num'];
    $nbkm = $_POST['nbkm_agence_client'];
    

    $clientmodel->ModifierClient($IdClient, $raison_sociale, $SIREN, $codeAPE, $adresse, $telecopie, $telephone, $email, $agence, $nbkm);
    header("Location: ./?action=visualiserClient&clientnum=$IdClient");
}

$titre = "Modification Client";

include "$racine/vue/entete.html.php";

include "$racine/vue/vueModifierClient.php";
?>