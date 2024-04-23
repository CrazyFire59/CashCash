<?php

class Materiel extends Bdd{

    function getInterventionMateriels($interventionId){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT * FROM interventionmateriel im
            INNER JOIN intervention i ON i.intervention_id = im.intervention_id
            INNER JOIN materiel m ON m.materiel_num_serie = im.materiel_num_serie
            INNER JOIN materiel_type mt ON mt.materiel_type_id = m.materiel_type_id
            WHERE i.intervention_id = $interventionId"
            /* OU */
            // "SELECT * FROM interventionmateriel im, materiel m, materiel_type mt
            // WHERE m.materiel_num_serie = im.materiel_num_serie
            // AND m.materiel_type_id = mt.materiel_type_id
            // AND im.intervention_id = $interventionId"
        );

        $req->execute();

        $materiels = $req->fetchAll();

        return $materiels;
    }

    function editMateriel($materielNum, $materielTypeId) {
        $conn = $this->connexionPDO();
        
        $req = $conn->prepare(
            "UPDATE materiel m
            INNER JOIN interventionmateriel im ON m.materiel_num_serie = im.materiel_num_serie 
            SET m.materiel_type_id = :materielTypeId
            WHERE im.materiel_num_serie = :idIntervention"
        );
    
        $req->bindValue(":idIntervention", $materielNum, PDO::PARAM_INT);    
        $req->bindValue(":materielTypeId", $materielTypeId, PDO::PARAM_INT);
        $req->execute();
    }

    function getAllMaterielsType() {
        $conn = $this->connexionPDO();
    
        $req = $conn->prepare("SELECT * FROM materiel_type");
    
        $req->execute();
    
        $materiels = $req->fetchAll();
    
        return $materiels;
    }
    

}

?>
