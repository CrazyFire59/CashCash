<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/Intervention.php";
include_once "$racine/modele/Technicien.php";

// include_once "./modele/Bdd.php";
// include_once "./modele/Intervention.php";
include "$racine/vue/entete.html.php";


$Intervention = new Intervention();

$interventions = $Intervention->getAllInterventions();
// var_dump($interventions[0]);
// echo '<pre>';
// print_r($interventions[0]);
// echo '</pre>';
$Technicien = new Technicien();
$techniciens = $Technicien->getAllTechniciens();
// var_dump($techniciens);

// si on clique sur le bouton "Rechercher"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $numTechnicien = $_POST['numTechnicien'];
    // var_dump($numTechnicien); //string
    // var_dump(intval($numTechnicien)); //int

    //si c'est 0 c'est que c'est l'option "Choisir technicien" et qu'aucun technicien a été choisi
    if ($numTechnicien != 0){
        //je fais intval($numTechnicien) car le numTechnicien dans la value du select est un string 
        //c'est pour le convertir en int et pouvoir faire la requete sql
        $interventions = $Intervention->getInterventionsByEmployeNumMatricule(intval($numTechnicien));
    } 

}


include "$racine/vue/vueListeInterventionsAssistant.php";
// include "./vue/vueListeInterventionsAssistant.php";

include "$racine/vue/pied.html.php";
?>