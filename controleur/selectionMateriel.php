<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/Clients.php";
include_once "$racine/modele/Intervention.php";

$clientnum = $_GET['client_num'];
$intervention_date = $_GET['intervention_date'];
$intervention_heure = $_GET['intervention_heure'];
$employe_num_matricule = $_GET['employe_num_matricule'];

$intervention = new Intervention();
$idIntervention = $intervention->getNumInterventionByAll($intervention_date, $intervention_heure, $clientnum, $employe_num_matricule);

$materiels = $clientmodel->GetMaterielsClient($clientnum);





//print_r($idIntervention);
//echo '<br/><br/><br/><br/>';
//print_r($materiels);

$nombreMateriel = 0;

if (isset($_POST['SMValider'])) {
    $nombreMateriel = $_POST['nombreMateriel'];
    for ($i = 0; $i < $nombreMateriel; $i++) {
        $numMateriel = $_POST['materiel' . $i];
        $intervention->AjouterInterventionMateriel($numMateriel, $idIntervention[0]['intervention_id']);
    }
    header("Location: ./?action=affecterVisite");
}



$titre = "Selection Materiel";

include "$racine/vue/entete.html.php";

if (isset($_POST['submit1'])) {
    $nombreMateriel = $_POST['nombreMateriel'];
    include "$racine/vue/vueSelectionMateriel.php";
}else{
    include "$racine/vue/vueNombreMateriel.php";
}

include "$racine/vue/pied.html.php";



?>