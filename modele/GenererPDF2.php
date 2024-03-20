<?php
$bddPDF2 = new Bdd();
class GenererPDF2 {
    private $bdd;

    public function __construct($bddInstance) {
        $this->bdd = $bddInstance;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function Intervention($id_inter) {
        $query = "SELECT * FROM intervention i, employe e, technicien t, client c WHERE i.employe_num_matricule = e.employe_num_matricule AND i.client_num = c.client_num AND t.employe_num_matricule = e.employe_num_matricule AND intervention_id = :id_inter;";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':id_inter', $id_inter);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }  
    
}
$ModelePDF2 = new GenererPDF2($bddPDF2);
?>