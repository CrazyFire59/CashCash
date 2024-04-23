<?php

class Technicien extends Bdd{

    function getAllTechniciens(){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
        "SELECT * FROM technicien t
        INNER JOIN employe e ON t.employe_num_matricule = e.employe_num_matricule"
        );

        $req->execute();

        $techniciens = $req->fetchAll();

        return $techniciens;
    }

    function getTechnicienByNumTech($numTech){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
        "SELECT * FROM technicien t
        INNER JOIN employe e ON t.employe_num_matricule = e.employe_num_matricule
        WHERE t.employe_num_matricule = :numTech"
        );

        $req->bindValue(":numTech", $numTech, PDO::PARAM_INT);

        $req->execute();

        $technicien = $req->fetch();

        return $technicien;
    }

    function getAllTechniciensInSameAgencyAsClient($numAgenceOfClient){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
        "SELECT * FROM technicien t
        INNER JOIN employe e ON t.employe_num_matricule = e.employe_num_matricule
        WHERE t.agence_num = :numAgenceOfClient"
        );

        $req->bindValue(":numAgenceOfClient", $numAgenceOfClient, PDO::PARAM_INT);

        $req->execute();

        $techniciens = $req->fetchAll();

        return $techniciens;
    }

    /*function getAllInterventions(){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT * 
            FROM intervention i 
            INNER JOIN client c ON i.client_num = c.client_num
            INNER JOIN employe e ON i.employe_num_matricule = e.employe_num_matricule"
        );

        $req->execute();

        $interventions = $req->fetchAll();

        return $interventions;
    }*/

    /*function getTechnicienById($employeNum){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT * 
            FROM technicien t         
            INNER JOIN employe e ON t.employe_num_matricule = e.employe_num_matricule
            WHERE i.intervention_id = :idIntervention"
        );

        $req->bindValue(":employeNum", $employeNum, PDO::PARAM_INT);

        $req->execute();

        $intervention = $req->fetch();

        return $intervention;
    }*/

    function getMatriculebyUsername(){
        $username = $_SESSION['username'];
        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT employe_num_matricule
            FROM utilisateur
            WHERE username = :username"
        );
        $req->bindValue(":username", $username, PDO::PARAM_STR);
        $req->execute();
        $matricule = $req->fetch();
        return $matricule[0];
    }  

}
?>
