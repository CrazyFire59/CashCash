<?php
$bddAgences = new Bdd();
class Agence {
    private $bdd;

    public function __construct($bddInstance) {
        $this->bdd = $bddInstance;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    function getAllAgences(){

        $req = $this->bdd->connexionPDO()->prepare("SELECT * FROM agence");

        $req->execute();

        $agences = $req->fetchAll();

        return $agences;
    }

    function getAgenceByNum($numAgence){

        $req = $this->bdd->connexionPDO()->prepare("SELECT * FROM agence WHERE agence_num = :numAgence");

        $req->bindParam(':numAgence', $numAgence);

        $req->execute();

        $agence = $req->fetch();

        return $agence;
    }

    function getAllAgencesNum(){

        $req = $this->bdd->connexionPDO()->prepare("SELECT agence_num FROM agence");

        $req->execute();

        $agences = $req->fetchAll();

        return $agences;
    }

}
$agences = new Agence($bddAgences);

?>