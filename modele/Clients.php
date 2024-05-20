<?php

/**
 * La classe Client gère les opérations liées aux clients dans la base de données.
 * Elle permet de récupérer, rechercher, afficher, modifier les informations des clients,
 * ainsi que récupérer les matériels associés à un client.
 * 
 * @package    CashCash
 * @subpackage modele
 * @version    1.0
 * @since      2024-05-20
 */
class Client {

    /**
     * Instance de la base de données.
     * @var Bdd
     */
    private $bdd;

    /**
     * Constructeur de la classe Client.
     * @param Bdd $bddInstance Instance de la base de données.
     */
    public function __construct($bddInstance) {
        $this->bdd = $bddInstance;
        // Démarrage de la session si elle n'est pas déjà démarrée
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Récupère tous les clients de la base de données.
     * @return array Un tableau contenant tous les clients.
     */
    function getAllClients(){
        $requete = "SELECT * FROM client";
        $statment = $this->bdd->connexionPDO()->prepare($requete);
        $statment->execute();
        $clients = $statment->fetchAll();
        return $clients;
    }

    /**
     * Recherche un client par son identifiant.
     * @param int $idClient L'identifiant du client à rechercher.
     * @return array Un tableau contenant les informations du client trouvé.
     */
    function rechercheClient($idClient){
        $requete = "SELECT * FROM client WHERE client_num = :idClient";
        $statment = $this->bdd->connexionPDO()->prepare($requete);
        $statment->bindParam(':idClient', $idClient);
        $statment->execute();
        $client = $statment->fetchAll();
        return $client;
    }

    /**
     * Affiche les informations d'un client.
     * @param int $id L'identifiant du client à afficher.
     * @return array Un tableau contenant les informations du client à afficher.
     */
    function AffichageClient($id){
        $requete = "SELECT * FROM client WHERE client_num = :id";
        $statment = $this->bdd->connexionPDO()->prepare($requete);
        $statment->bindParam(':id', $id);
        $statment->execute();
        $client = $statment->fetchAll();
        return $client;
    }

    /**
     * Modifie les informations d'un client dans la base de données.
     * @param int $IdClient L'identifiant du client à modifier.
     * @param string $adresse La nouvelle adresse du client.
     * @param string $telecopie Le nouveau numéro de télécopie du client.
     * @param string $telephone Le nouveau numéro de téléphone du client.
     * @param string $email Le nouvel email du client.
     * @param int $agence Le numéro de l'agence associée au client.
     * @param int $nbkm Le nombre de kilomètres entre le client et son agence.
     */
    function ModifierClient($IdClient, $adresse, $telecopie, $telephone, $email, $agence, $nbkm) {
        // Requête pour modifier un client
        $requete = "UPDATE client 
        SET 
        client_adresse = :adresse, 
        client_num_télécopie = :telecopie, 
        client_téléphone = :telephone, 
        client_email = :email, 
        agence_num = :agence, 
        nbkm_agence_client = :nbkm
        WHERE client_num = :IdClient";

        $statment = $this->bdd->connexionPDO()->prepare($requete);
        $statment->bindParam(':IdClient', $IdClient);
        $statment->bindParam(':adresse', $adresse);
        $statment->bindParam(':telecopie', $telecopie);
        $statment->bindParam(':telephone', $telephone);
        $statment->bindParam(':email', $email);
        $statment->bindParam(':agence', $agence);
        $statment->bindParam(':nbkm', $nbkm);

        $statment->execute(); 
    }

    /**
     * Récupère les matériels associés à un client.
     * @param int $idClient L'identifiant du client.
     * @return array Un tableau contenant les matériels associés au client.
     */
    function GetMaterielsClient($idClient){
        $requete = "SELECT * FROM materiel WHERE client_num = :idClient";
        $statment = $this->bdd->connexionPDO()->prepare($requete);
        $statment->bindParam(':idClient', $idClient);
        $statment->execute();
        $materiels = $statment->fetchAll();
        return $materiels;
    }
}

// Instance de la base de données
$bddClient = new Bdd();
// Instance de la classe Client avec l'instance de la base de données
$clientmodel = new Client ($bddClient);

?>
