<?php

    $bddAffecterVisite = new Bdd();
    class AffecterVisite extends Bdd {
    
        private $bdd;

        public function __construct($bddInstance) {
            $this->bdd = $bddInstance;
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    
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
    $AffecterVisite = new AffecterVisite($bddAffecterVisite);
?>