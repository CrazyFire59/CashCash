<?php
/**
 * La classe Materiel gère les opérations liées aux matériels.
 * Elle permet de récupérer les matériels associés à une intervention,
 * de modifier les détails d'un matériel, de supprimer un matériel,
 * d'ajouter un matériel à une intervention, et de récupérer tous les types de matériels.
 * 
 * @package    CashCash
 * @subpackage Modele
 * @version    1.0
 * @since      2024-05-20
 */
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

    public function deleteMateriel($materielNum, $interventionId) {

        $conn = $this->connexionPDO();

        $req1 = $conn->prepare("DELETE FROM interventionmateriel WHERE materiel_num_serie = :materielNum AND intervention_id = :interventionId");
        $req1->bindValue(":materielNum", $materielNum, PDO::PARAM_INT);
        $req1->bindValue(":interventionId", $interventionId, PDO::PARAM_INT);
        
        $req1->execute();
    }
    

    public function getAllMaterielsOfClient($clientNum) {

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT materiel_num_serie FROM materiel m 
            WHERE m.client_num = :clientNum"
        );

        $req->bindValue(":clientNum", $clientNum, PDO::PARAM_INT);

        $req->execute();

        $materiels = $req->fetchAll();

        return $materiels;
    }

    public function addMateriel($materiel_num_serie, $intervention_id) {

        $conn = $this->connexionPDO();
        $req2 = $conn->prepare(
            "INSERT INTO interventionmateriel 
                (materiel_num_serie, intervention_id) 
            VALUES 
                (:materiel_num_serie, :intervention_id)"
        );

        $req2->bindValue(":materiel_num_serie", $materiel_num_serie, PDO::PARAM_INT);
        $req2->bindValue(":intervention_id", $intervention_id, PDO::PARAM_INT);

        $req2->execute();
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
