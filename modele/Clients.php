<?php

$bddClient = new Bdd();
class Client {

    private $bdd;

    public function __construct($bddInstance) {
        $this->bdd = $bddInstance;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    function getAllClients(){
        $requete = "SELECT * FROM client";
        $statment = $this->bdd->connexionPDO()->prepare($requete);
        $statment->execute();
        $clients = $statment->fetchAll();
        return $clients;
        }

    function rechercheClient($idClient){
        $requete = "SELECT * FROM client WHERE client_num = :idClient";
        $statment = $this->bdd->connexionPDO()->prepare($requete);
        $statment->bindParam(':idClient', $idClient);
        $statment->execute();
        $client = $statment->fetchAll();
        return $client;
    } // recherche un client par son id

    //visualiser les informations d'un client
    function AffichageClient($id){
        $requete = "SELECT * FROM client WHERE client_num = :id";
        $statment = $this->bdd->connexionPDO()->prepare($requete);
        $statment->bindParam(':id', $id);
        $statment->execute();
        $client = $statment->fetchAll();
        return $client;
    } 

    function ModifierClient($IdClient, $adresse, $telecopie, $telephone, $email, $agence, $nbkm) {
        // requete pour modifier un client
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

    function GetMaterielsClient($idClient){
        $requete = "SELECT * FROM materiel WHERE client_num = :idClient";
        $statment = $this->bdd->connexionPDO()->prepare($requete);
        $statment->bindParam(':idClient', $idClient);
        $statment->execute();
        $materiels = $statment->fetchAll();
        return $materiels;

    }
}
$clientmodel = new Client ($bddClient);
?>