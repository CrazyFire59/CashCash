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
    }
?>