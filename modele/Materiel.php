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

    // function editMateriel($materielNum, $materiel_emplacement, $materiel_date_vente, $materiel_date_installation, $materiel_prix_vente) {
    function editMateriel($materielNum, $materiel_emplacement, $materiel_date_vente, $materiel_date_installation, $materiel_prix_vente) {
        $conn = $this->connexionPDO();
        
        $req = $conn->prepare(
            "UPDATE materiel m
            SET 
            m.materiel_emplacement = :materiel_emplacement,
            m.materiel_date_vente = :materiel_date_vente,
            m.materiel_date_installation = :materiel_date_installation,
            m.materiel_prix_vente = :materiel_prix_vente
            WHERE m.materiel_num_serie = :materielNum"
        );
    
        $req->bindValue(":materielNum", $materielNum, PDO::PARAM_INT);    
        $req->bindValue(":materiel_emplacement", $materiel_emplacement, PDO::PARAM_STR); 
        $req->bindValue(":materiel_date_vente", $materiel_date_vente, PDO::PARAM_STR);
        $req->bindValue(":materiel_date_installation", $materiel_date_installation, PDO::PARAM_STR);
        $req->bindValue(":materiel_prix_vente", $materiel_prix_vente, PDO::PARAM_INT);
        // $req->bindValue(":materielTypeId", $materielTypeId, PDO::PARAM_INT);
        $req->execute();
    }
    
    // -- SET m.materiel_type_id = :materielTypeId

    function getAllMaterielsType() {
        $conn = $this->connexionPDO();
    
        $req = $conn->prepare("SELECT * FROM materiel_type");
    
        $req->execute();
    
        $materiels = $req->fetchAll();
    
        return $materiels;
    }
    

}

?>
