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
    
}