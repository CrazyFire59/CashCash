<?php
require_once('../library/tcpdf/tcpdf.php');
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
        $query = "SELECT i.intervention_id,i.intervention_date,i.intervention_heure,i.client_num,i.employe_num_matricule, e.employe_nom, e.employe_prenom, c.client_raison_sociale FROM intervention i, client c, employe e WHERE i.client_num = c.client_num AND i.employe_num_matricule = e.employe_num_matricule AND i.intervention_id = :id_inter;";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':id_inter', $id_inter);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);       
        
        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);

        while ($row = $result) {
            $id_intervention = $row['intervention_id'];
            $date_intervention = $row['intervention_date'];
            $heure_intervention = $row['intervention_heure'];
            $num_client = $row['client_num'];
            $raison_sociale_client = $row['client_raison_sociale'];
            $num_tech = $row['employe_num_matricule'];
            $nom_tech = $row['employe_nom'] . ' ' . $row['employe_prenom'];

            $pdf->Cell(0, 10, "ID Intervention: $id_intervention", 0, 1);
            $pdf->Cell(0, 10, "Date: $date_intervention", 0, 1);
            $pdf->Cell(0, 10, "Heur: $heure_intervention", 0, 1);
            $pdf->Cell(0, 10, "Num Client: $num_client", 0, 1);
            $pdf->Cell(0, 10, "Raison Sociale Client: $raison_sociale_client", 0, 1);
            $pdf->Cell(0, 10, "Num Tech: $num_tech", 0, 1);
            $pdf->Cell(0, 10, "Nom Tech: $nom_tech", 0, 1);
        }
        $pdf->Output('intervention-'.$id_intervention.'.pdf', 'D');
        return $pdf;
    }  
}
$PDF = new GenererPDF($bddPDF);
?>