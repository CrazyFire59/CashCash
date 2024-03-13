<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

require_once "$racine/modele/Bdd.php";
require_once "$racine/modele/Intervention.php";
include_once "$racine/modele/Technicien.php";

$titre = "Valider Intervention";
include "$racine/vue/entete.html.php";

$Intervention = new Intervention();

$idIntervention = $_GET['interventionId'];

$intervention = $Intervention->getInterventionById($idIntervention);
// var_dump($interventions);
// echo '<pre>';
// print_r($intervention);
// echo '</pre>';

$date = $intervention["intervention_date"];
$heure = $intervention["intervention_heure"];

$Technicien = new Technicien();
$techniciens = $Technicien->getAllTechniciens();

$techniciensDansMemeAgenceQueClient = $Technicien->getAllTechniciensInSameAgencyAsClient($intervention["agence_num"]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $date = $_POST["date"];
    $heure = $_POST["heure"];
    $numTechnicien = $_POST["numTechnicien"];

    $Intervention->editIntervention($idIntervention, $date, $heure, $numTechnicien);


}

include "$racine/vue/vueValiderIntervention.php";

include "$racine/vue/pied.html.php";

?>