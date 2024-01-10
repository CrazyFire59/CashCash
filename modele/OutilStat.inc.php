<?php
$bddOutil = new Bdd();
class OutilStat {
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

    public function getstatdumois() {
        $query = "SELECT * FROM outilstat WHERE mois =  MONTH(NOW()) AND annee = YEAR(NOW())";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getstatmois($mois) {
        $query = "SELECT * FROM outilstat WHERE mois =  MONTH(:mois) AND annee = YEAR(:mois)";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':mois', $mois);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

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