<?php
include_once('Bdd.php');
$bddPDF = new Bdd();
class GenererPDF {
    private $bdd;

    public function __construct($bddInstance) {
        $this->bdd = $bddInstance;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function GenererPDF($id_inter) {
        $query = "SELECT DISTINCT 
        i.intervention_id,
        i.intervention_date,
        i.intervention_heure,
        i.client_num,
        i.employe_num_matricule,
        im.materiel_num_serie,
        im.intervention_id,
        im.tempsPasse,
        im.commentaire,
        m.materiel_num_serie,
        m.materiel_date_installation,
        m.materiel_emplacement,
        m.contrat_num,
        m.materiel_type_id,
        mt.materiel_type_id,
        mt.materiel_type_reference,
        mt.materiel_type_libelle,
        c.client_num,
        c.client_adresse,
        c.client_téléphone,
        c.client_email,
        c.agence_num,
        nbkm_agence_client,
        t.employe_num_matricule,
        t.technicien_telephone,
        t.technicien_mail,
        t.technicien_nom_qualification
    FROM 
        intervention i
        JOIN employe e ON i.employe_num_matricule = e.employe_num_matricule
        JOIN technicien t ON e.employe_num_matricule = t.employe_num_matricule
        JOIN client c ON i.client_num = c.client_num
        JOIN interventionmateriel im ON i.intervention_id = im.intervention_id
        JOIN materiel m ON im.materiel_num_serie = m.materiel_num_serie
        JOIN materiel_type mt ON m.materiel_type_id = mt.materiel_type_id
    WHERE  
        i.intervention_id = :id_inter;
    ";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':id_inter', $id_inter);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);       
    
        return $result;
    }  
    
    
}
$ModelePDF = new GenererPDF($bddPDF);
?>