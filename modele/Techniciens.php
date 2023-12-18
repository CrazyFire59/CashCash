<?php

class Technicien extends Bdd{

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

}

    

?>
