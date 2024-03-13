<?php

class Intervention extends Bdd{

    function getAllInterventions(){

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
    }

    function getInterventionById($idIntervention){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT * 
            FROM intervention i         
            INNER JOIN client c ON i.client_num = c.client_num
            INNER JOIN employe e ON i.employe_num_matricule = e.employe_num_matricule
            WHERE i.intervention_id = :idIntervention"
        );

        $req->bindValue(":idIntervention", $idIntervention, PDO::PARAM_INT);

        $req->execute();

        $intervention = $req->fetch();

        return $intervention;
    }

    function getInterventionsByEmployeNumMatricule($employeNumMatricule){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT * 
            FROM intervention i         
            INNER JOIN client c ON i.client_num = c.client_num
            INNER JOIN employe e ON i.employe_num_matricule = e.employe_num_matricule
            WHERE i.employe_num_matricule = :employeNumMatricule"
        );

        $req->bindValue(":employeNumMatricule", $employeNumMatricule, PDO::PARAM_INT);

        $req->execute();

        $interventions = $req->fetchAll();

        return $interventions;
    }

    function getTechnicienInterventions($numTech){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT * 
            FROM intervention i         
            INNER JOIN client c ON i.client_num = c.client_num
            INNER JOIN employe e ON i.employe_num_matricule = e.employe_num_matricule
            INNER JOIN interventionmateriel im ON im.intervention_id = i.intervention_id
            WHERE i.employe_num_matricule = :numTech"
        );

        $req->bindValue(":numTech", $numTech, PDO::PARAM_INT);

        $req->execute();

        $techIntervention = $req->fetchAll();

        return $techIntervention;
    }

    function getInterventionsByDate($date){
        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT * 
            FROM intervention i         
            INNER JOIN client c ON i.client_num = c.client_num
            INNER JOIN employe e ON i.employe_num_matricule = e.employe_num_matricule
            WHERE i.intervention_date = :date"
        );

        $req->bindValue(":date", $date, PDO::PARAM_STR);

        $req->execute();

        $interventions = $req->fetchAll();

        return $interventions;
    }
    
    function getInterventionsByEmployeNumMatriculeAndDate($employeNumMatricule, $date){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT * 
            FROM intervention i         
            INNER JOIN client c ON i.client_num = c.client_num
            INNER JOIN employe e ON i.employe_num_matricule = e.employe_num_matricule
            WHERE i.employe_num_matricule = :employeNumMatricule AND i.intervention_date = :date"
        );

        $req->bindValue(":employeNumMatricule", $employeNumMatricule, PDO::PARAM_INT);
        $req->bindValue(":date", $date, PDO::PARAM_STR);
        
        $req->execute();
        
        $interventions = $req->fetchAll();
        
        return $interventions;
    }

    function editIntervention($idIntervention, $date, $heure, $employeNumMatricule){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "UPDATE intervention 
            SET intervention_date = :date, intervention_heure = :heure, employe_num_matricule = :employeNumMatricule 
            WHERE intervention_id = :idIntervention"
        );
        // $req = $conn->prepare(
        //     "UPDATE intervention 
        //     SET intervention_date = '2024-01-20', intervention_heure = '08:00:12', employe_num_matricule = 3 
        //     WHERE intervention_id = 1"
        // );
        //UPDATE intervention 
        //SET intervention_date = '2024-01-20', intervention_heure = '08:00:11', employe_num_matricule = 3 
        //WHERE intervention_id = 1;

        $req->bindValue(":idIntervention", $idIntervention, PDO::PARAM_INT);    
        $req->bindValue(":date", $date, PDO::PARAM_STR);
        $req->bindValue(":heure", $heure, PDO::PARAM_STR);
        $req->bindValue(":employeNumMatricule", $employeNumMatricule, PDO::PARAM_INT);

        $req->execute();
    }

}

?>
