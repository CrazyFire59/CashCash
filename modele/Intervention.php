<?php
/**
 * La classe Intervention gère les opérations liées aux interventions.
 * Elle permet de récupérer des informations sur les interventions, de valider les interventions
 * et de modifier les détails des interventions.
 * 
 * @package    CashCash
 * @subpackage Modele
 * @version    1.0
 * @since      2024-05-20
 */
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
            INNER JOIN interventionmateriel im ON im.intervention_id = i.intervention_id 
            INNER JOIN materiel m ON m.materiel_num_serie = im.materiel_num_serie 
            INNER JOIN materiel_type mt ON mt.materiel_type_id = m.materiel_type_id 
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
            "SELECT DISTINCT i.* 
            FROM intervention i
            INNER JOIN client c ON i.client_num = c.client_num
            INNER JOIN employe e ON i.employe_num_matricule = e.employe_num_matricule
            INNER JOIN interventionmateriel im ON im.intervention_id = i.intervention_id
            WHERE i.employe_num_matricule = :numTech
            AND im.tempsPasse IS NULL 
            AND im.commentaire IS NULL;"
            
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
            SET 
            intervention_date = :date, 
            intervention_heure = :heure,
            employe_num_matricule = :employeNumMatricule 
            
            WHERE intervention_id = :idIntervention"
        );

        $req->bindValue(":idIntervention", $idIntervention, PDO::PARAM_INT);    
        $req->bindValue(":date", $date, PDO::PARAM_STR);
        $req->bindValue(":heure", $heure, PDO::PARAM_STR);
        $req->bindValue(":employeNumMatricule", $employeNumMatricule, PDO::PARAM_INT);

        $req->execute();
    }

    function getAllMaterielFromIntervention($numIntervention){

        $conn = $this->connexionPDO();
        $req = $conn->prepare(
            "SELECT * 
            FROM interventionmateriel im, materiel m, materiel_type mt
            WHERE m.materiel_num_serie = im.materiel_num_serie
            AND m.materiel_type_id = mt.materiel_type_id
            AND im.intervention_id = :numIntervention"
        );
        $req->bindValue(":numIntervention", $numIntervention, PDO::PARAM_INT);
        $req->execute();
        $materiels = $req->fetchAll();
        return $materiels;
        
    }

    function ValiderIntervention($numMateriel, $numIntervention, $tempsPasse, $commentaire){

        $conn = $this->connexionPDO();
        $req = $conn->prepare(
            "UPDATE interventionmateriel 
            SET tempsPasse = :tempsPasse, commentaire = :commentaire
            WHERE materiel_num_serie = :numMateriel AND intervention_id = :numIntervention"
        );

        $req->bindValue(":tempsPasse", $tempsPasse, PDO::PARAM_STR);
        $req->bindValue(":commentaire", $commentaire, PDO::PARAM_STR);
        $req->bindValue(":numMateriel", $numMateriel, PDO::PARAM_INT);
        $req->bindValue(":numIntervention", $numIntervention, PDO::PARAM_INT);
        $req->execute();
    }

    function getNumInterventionByAll ($date, $heure, $clientNum, $matriculeNumSerie)
    {	
        $conn = $this->connexionPDO();
        $req = $conn->prepare(
            "SELECT intervention_id
            FROM intervention
            WHERE intervention_date = :date AND intervention_heure = :heure AND client_num = :clientNum AND employe_num_matricule = :matriculeNumSerie"
        );
        $req->bindValue(":date", $date, PDO::PARAM_STR);
        $req->bindValue(":heure", $heure, PDO::PARAM_STR);
        $req->bindValue(":clientNum", $clientNum, PDO::PARAM_INT);
        $req->bindValue(":matriculeNumSerie", $matriculeNumSerie, PDO::PARAM_INT);
        $req->execute();
        $interventions = $req->fetchAll();
        return $interventions;
    }
    
    function AjouterInterventionMateriel($numMateriel, $numIntervention){
        
        $conn = $this->connexionPDO();
        $req = $conn->prepare(
            "INSERT INTO interventionmateriel (materiel_num_serie, intervention_id)
            VALUES (:numMateriel, :numIntervention)"
        );
        $req->bindValue(":numMateriel", $numMateriel, PDO::PARAM_INT);
        $req->bindValue(":numIntervention", $numIntervention, PDO::PARAM_INT);
        $req->execute();
    }

}

?>
