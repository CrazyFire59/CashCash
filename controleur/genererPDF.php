<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
// Include the main TCPDF library (search for installation path).
require_once("$racine/library/TCPDF/tcpdf.php");
include_once "$racine/modele/Bdd.php";
$bddPDF = new Bdd();


// extend TCPF with custom functions
class MYPDF extends TCPDF {

    private $bdd;

    public function __construct($bddInstance) {
        $this->bdd = $bddInstance;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Load table data from file
    public function LoadData($id_inter) {
        // Données du tableau
        $query = "SELECT * FROM intervention i, interventionmateriel im, materiel m, materiel_type mt WHERE i.intervention_id = im.intervention_id AND im.materiel_num_serie = m.materiel_num_serie AND m.materiel_type_id = mt.materiel_type_id AND  i.intervention_id = :id_inter;";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':id_inter', $id_inter);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);       
    
        return $result;

    }

    // public function LoadData2($id_inter) {
    //     // Données du tableau
    //     $query = "SELECT * FROM intervention i, employe e, technicien t, client c WHERE i.employe_num_matricule = e.employe_num_matricule AND i.client_num = c.client_num AND t.employe_num_matricule = e.employe_num_matricule AND intervention_id = :id_inter;";
    //     $statement = $this->bdd->connexionPDO()->prepare($query);
    //     $statement->bindParam(':id_inter', $id_inter);
    //     $statement->execute();
    //     $result = $statement->fetch(PDO::FETCH_ASSOC);

    //     return $result;
        
    // }

    // Colored table
    public function InterventionTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(40, 35, 35, 40, 40);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row["intervention_id"], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row["intervention_date"], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row["intervention_heure"], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row["client_num"], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $row["employe_num_matricule"], 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Intervention Materiel table
    public function InterventionMaterielTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(0, 196, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 128, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(35, 35, 55, 65);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row["materiel_num_serie"], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row["intervention_id"], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row["tempsPasse"], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row["commentaire"], 'LR', 0, 'L', $fill);
            
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Materiel table
    public function MaterielTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(0, 0, 255);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 128);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(35, 40, 45, 40, 30);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row["materiel_num_serie"], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row["materiel_date_installation"], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row["materiel_emplacement"], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row["contrat_num"], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $row["materiel_type_id"], 'LR', 0, 'L', $fill);
            
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Materiel Type table
    public function MaterielTypeTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(0, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(60, 65, 65);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row["materiel_type_id"], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row["materiel_type_reference"], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row["materiel_type_libelle"], 'LR', 0, 'L', $fill);
            
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Client table
    public function ClientTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(0, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(60, 65, 65);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row["materiel_type_id"], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row["materiel_type_reference"], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row["materiel_type_libelle"], 'LR', 0, 'L', $fill);
            
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    // Technicien table
    public function TechnicienTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(200, 200, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(40, 45, 60, 45);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row["employe_num_matricule"], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row["technicien_telephone"], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row["technicien_mail"], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row["technicien_nom_qualification"], 'LR', 0, 'L', $fill);

            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$idIntervention = $_GET['interventionId'];

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

// Interventions

$html = '<br><h1 style="text-align:center">CashCash</h1><br>
<h3>Interventions :</h3>';
$pdf->writeHTML($html, true, false, true, false, '');

$header = array('ID Intervention', 'Date', 'Heure', 'Numero Client', 'Matricule Employe');
$data = $pdf->LoadData($idIntervention);
$pdf->InterventionTable($header, $data);

// Interventions Materiels

$html = "<br><br><br><h3>Materiels :</h3>";
$pdf->writeHTML($html, true, false, true, false, '');

$header = array('ID Materiel', 'ID Intervention', 'Temps passe', 'Commentaire');

$pdf->InterventionMaterielTable($header, $data);

// Materiels

$html = "<br><br><br><h3>Materiels :</h3>";
$pdf->writeHTML($html, true, false, true, false, '');

$header = array('ID Materiel', 'Date Installation', 'Emplacement', 'Numero Contrat', 'Type ID');
$pdf->MaterielTable($header, $data);

// Materiels Type

$html = "<br><br><br><h3>Materiels Type :</h3>";
$pdf->writeHTML($html, true, false, true, false, '');

$header = array('ID Materiel Type', 'Reference', 'Libelle');
$pdf->MaterielTypeTable($header, $data);

// Technicien

$html = "<br><br><br><h3>Techniciens :</h3>";
$pdf->writeHTML($html, true, false, true, false, '');

$header = array('Matricule', 'Telephone', 'Mail', 'Qualification');
$pdf->TechnicienTable($header, $data2);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('example.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+