<?php

class Agence extends Bdd{

    function getAllAgences(){

        $conn = $this->connexionPDO();

        $req = $conn->prepare("SELECT * FROM agence");

        $req->execute();

        $agences = $req->fetchAll();

        return $agences;
    }

}


?>