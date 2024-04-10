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
        $query = "SELECT i.intervention_id,i.intervention_date,i.intervention_heure,i.client_num,i.employe_num_matricule,im.materiel_num_serie,im.intervention_id,im.tempsPasse,im.commentaire,m.materiel_num_serie,m.materiel_date_installation,m.materiel_emplacement,m.contrat_num,m.materiel_type_id,mt.materiel_type_id,mt.materiel_type_reference,mt.materiel_type_libelle,c.client_num,c.client_adresse,c.client_téléphone,c.client_email,c.agence_num,nbkm_agence_client,t.employe_num_matricule,t.technicien_telephone,t.technicien_mail,t.technicien_nom_qualification
        FROM intervention i,employe e, technicien t, client c, interventionmateriel im, materiel m, materiel_type mt 
        WHERE i.intervention_id = im.intervention_id 
        AND im.materiel_num_serie = m.materiel_num_serie 
        AND m.materiel_type_id = mt.materiel_type_id 
        AND i.employe_num_matricule = e.employe_num_matricule 
        AND e.employe_num_matricule = t.employe_num_matricule 
        AND i.client_num = c.client_num 
        AND  i.intervention_id = :id_inter;";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':id_inter', $id_inter);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);       
    
        return $result;
    }  
    
    
}
$ModelePDF = new GenererPDF($bddPDF);
?>