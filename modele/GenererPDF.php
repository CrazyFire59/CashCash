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
        $query = "SELECT * FROM intervention i, interventionmateriel im, materiel m, materiel_type mt WHERE i.intervention_id = im.intervention_id AND im.materiel_num_serie = m.materiel_num_serie AND m.materiel_type_id = mt.materiel_type_id AND  i.intervention_id = :id_inter;";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':id_inter', $id_inter);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);       
    
        return $result;
    }  
    
}
$ModelePDF = new GenererPDF($bddPDF);
?>