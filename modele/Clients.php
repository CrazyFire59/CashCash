<?php
    class Client extends Bdd {
    function getAllClients(){
        $db = $this->connexionPDO();
        $requete = "SELECT * FROM client";
        $statment = $db->prepare($requete);
        $statment->execute();
        $clients = $statment->fetchAll();
        return $clients;
        }

    function rechercheClient($id){
        $db = $this->connexionPDO();
        $requete = "SELECT * FROM client WHERE client_num = :id";
        $statment = $db->prepare($requete);
        $statment->bindParam(':id', $id);
        $statment->execute();
        $client = $statment->fetchAll();
        return $client;
    } // recherche un client par son id

    //visualiser les informations d'un client
    function visualiserClient($id){
        $db = $this->connexionPDO();
        $requete = "SELECT * FROM client WHERE client_num = :id";
        $statment = $db->prepare($requete);
        $statment->bindParam(':id', $id);
        $statment->execute();
        $client = $statment->fetch();
        return $clientVisuelle;
    } 
    }
?>