<?php

/**
 * La classe OutilStat gère les opérations liées aux statistiques des outils.
 * Elle permet de récupérer des statistiques globales, mensuelles et spécifiques à un mois donné.
 * 
 * @package    CashCash
 * @subpackage Modele
 * @version    1.0
 * @since      2024-05-20
 */
$bddOutil = new Bdd();
class OutilStat {
    private $bdd;

    /**
     * Constructeur de la classe OutilStat.
     *
     * @param object $bddInstance Instance de la connexion à la base de données.
     */
    public function __construct($bddInstance) {
        $this->bdd = $bddInstance;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Récupère toutes les statistiques des outils.
     *
     * @return array Les statistiques des outils.
     */
    public function getstat() {
        $query = "SELECT * FROM outilstat";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Récupère les statistiques des outils pour le mois en cours.
     *
     * @return array Les statistiques des outils pour le mois en cours.
     */
    public function getstatdumois() {
        $query = "SELECT * FROM outilstat WHERE mois =  MONTH(NOW()) AND annee = YEAR(NOW())";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Récupère les statistiques des outils pour un mois spécifique.
     *
     * @param int $mois Le mois pour lequel récupérer les statistiques.
     * @return array Les statistiques des outils pour le mois spécifié.
     */
    public function getstatmois($mois) {
        $query = "SELECT * FROM outilstat WHERE mois =  MONTH(:mois) AND annee = YEAR(:mois)";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':mois', $mois);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Récupère le mois et l'année actuels sous forme de chaîne de caractères (AAAA-MM).
     *
     * @return string Le mois et l'année actuels sous forme de chaîne de caractères.
     */
    public function getmoisetannee() {
        $query = "SELECT DISTINCT MONTH(NOW()) as mois, YEAR(NOW()) as annee FROM outilstat";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $mois=0;
        if($result[0]['mois'] < 10){ $mois = '0' . $result[0]['mois']; }else{ $mois = $result[0]['mois']; }
        $ma= $result[0]['annee'] . '-' . $mois;
        return $ma;
    }
   
}
$outilStat = new OutilStat($bddOutil);
?>
