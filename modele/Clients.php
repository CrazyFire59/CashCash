<?php

$bddClient = new Bdd();
class Client{

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

    function rechercheClient($id){
        $requete = "SELECT * FROM client WHERE client_num = :id";
        $statment = $this->bdd->connexionPDO()->prepare($requete);
        $statment->bindParam(':id', $id);
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
}
$clientmodel = new Client ($bddClient);
?>