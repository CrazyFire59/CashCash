<?php
include('Bdd.php');
$bdd = new Bdd();
class ConnexionModel {
    private $bdd;

    public function __construct($bddInstance) {
        $this->bdd = $bddInstance;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function getstat() {
        $query = "SELECT * FROM outilstat";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}