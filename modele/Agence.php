<?php

/**
 * La classe Agence gère les opérations liées aux agences dans la base de données.
 * Elle permet de récupérer des informations sur les agences.
 * 
 * @package    CashCash
 * @subpackage Modele
 * @version    1.0
 * @since      2024-05-20
 */
class Agence {
    /**
     * Instance de la base de données.
     * @var Bdd
     */
    private $bdd;

    /**
     * Constructeur de la classe Agence.
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
     * Récupère toutes les agences de la base de données.
     * @return array Un tableau contenant toutes les agences.
     */
    function getAllAgences(){

        $req = $this->bdd->connexionPDO()->prepare("SELECT * FROM agence");

        $req->execute();

        $agences = $req->fetchAll();

        return $agences;
    }

    /**
     * Récupère une agence par son numéro.
     * @param int $numAgence Le numéro de l'agence à récupérer.
     * @return array|false Un tableau contenant les informations de l'agence ou FALSE si l'agence n'est pas trouvée.
     */
    function getAgenceByNum($numAgence){

        $req = $this->bdd->connexionPDO()->prepare("SELECT * FROM agence WHERE agence_num = :numAgence");

        $req->bindParam(':numAgence', $numAgence);

        $req->execute();

        $agence = $req->fetch();

        return $agence;
    }

    /**
     * Récupère tous les numéros d'agences de la base de données.
     * @return array Un tableau contenant tous les numéros d'agences.
     */
    function getAllAgencesNum(){

        $req = $this->bdd->connexionPDO()->prepare("SELECT agence_num FROM agence");

        $req->execute();

        $agences = $req->fetchAll();

        return $agences;
    }

}

// Instance de la base de données
$bddAgences = new Bdd();
// Instance de la classe Agence avec l'instance de la base de données
$agences = new Agence($bddAgences);

?>
