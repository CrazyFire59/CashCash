<?php

/**
 * Classe Bdd.
 * Cette classe doit fournir des méthodes pour se connecter à une base de données.
 */
$bddAffecterVisite = new Bdd();

/**
 * Classe AffecterVisite.
 * Hérite de la classe Bdd et permet d'affecter une visite (intervention) en insérant les détails dans la base de données.
 */
class AffecterVisite extends Bdd {

    /**
     * @var Bdd Instance de la classe Bdd pour la connexion à la base de données.
     */
    private $bdd;

    /**
     * Constructeur de la classe AffecterVisite.
     * Initialise l'instance de la base de données et démarre une session si elle n'est pas déjà démarrée.
     *
     * @param Bdd $bddInstance Instance de la classe Bdd.
     */
    public function __construct($bddInstance) {
        $this->bdd = $bddInstance;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Affecte une visite en insérant les détails de l'intervention dans la base de données.
     *
     * @param string $intervention_date La date de l'intervention.
     * @param string $intervention_heure L'heure de l'intervention.
     * @param int $client_num Le numéro du client.
     * @param int $employe_num_matricule Le matricule de l'employé.
     * @return bool Retourne true si l'insertion est réussie, sinon false.
     */
    function getAffecterVisite($intervention_date, $intervention_heure, $client_num, $employe_num_matricule) {
        $conn = $this->connexionPDO();
        $req = $conn->prepare(
            "INSERT INTO intervention (`intervention_date`, intervention_heure, client_num, employe_num_matricule) 
            VALUES (:intervention_date, :intervention_heure, :client_num, :employe_num_matricule)"
        );
        $req->bindValue(":intervention_date", $intervention_date, PDO::PARAM_STR);
        $req->bindValue(":intervention_heure", $intervention_heure, PDO::PARAM_STR);
        $req->bindValue(":client_num", $client_num, PDO::PARAM_INT);
        $req->bindValue(":employe_num_matricule", $employe_num_matricule, PDO::PARAM_INT);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

}

/**
 * Création d'une instance de la classe AffecterVisite.
 * @var AffecterVisite Instance de la classe AffecterVisite.
 */
$AffecterVisite = new AffecterVisite($bddAffecterVisite);

?>