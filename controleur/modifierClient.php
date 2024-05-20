<?php

/**
 * Ce script gère la modification des informations d'un client. Il récupère les détails d'un client spécifique,
 * permet de modifier ces informations via un formulaire, et met à jour la base de données avec les nouvelles valeurs.
 * 
 * @package    CashCash
 * @subpackage controleur
 * @version    1.0
 * @since      2024-05-20
 */

// Vérifie si le script est appelé directement
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// Inclusion des modèles nécessaires
include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/Clients.php";
include_once "$racine/modele/Agence.php";

// Récupération de l'ID du client depuis les paramètres GET
$IdClient = $_GET['clientnum'];

// Récupération des informations du client
$client = $clientmodel->AffichageClient($IdClient);

// Assignation des informations du client à des variables
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

// Récupération de la liste des agences
$agenceListe = $agences->getAllAgencesNum();

// Traitement de la modification des informations du client
if (isset($_POST['modifier'])) {
    $adresse = $_POST['adresse'];
    $telecopie = $_POST['numTelephonecopie'];
    $telephone = $_POST['numTelephone'];
    $email = $_POST['Email'];
    $agence = $_POST['numagence'];
    $nbkm = $_POST['nbkm'];

    // Mise à jour des informations du client dans la base de données
    $clientmodel->ModifierClient($IdClient, $adresse, $telecopie, $telephone, $email, $agence, $nbkm);

    // Redirection vers la page de recherche de clients
    header("Location: .?action=RechercheClient");
}

// Définition du titre de la page
$titre = "Modification Client";

// Inclusion de l'en-tête de la page
include "$racine/vue/entete.html.php";

// Inclusion de la vue pour la modification du client
include "$racine/vue/vueModifierClient.php";

// Inclusion du pied de page
include "$racine/vue/pied.html.php";
?>
