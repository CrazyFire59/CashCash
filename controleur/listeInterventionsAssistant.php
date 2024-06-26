<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/Intervention.php";
include_once "$racine/modele/Technicien.php";


if(isset($_SESSION["role"])){
    if($_SESSION["role"]==1){
        $role = "Assistant";
    }else if($_SESSION["role"]==2){
        $role = "Agent";
    }else if($_SESSION["role"]==3){
        $role = "Technicien";
    }else{
        $role = "Inconnu";
    } 
}else{
    $role = "Inconnu";
}

if ($role == "Assistant"){
    

    $titre = "Intervention Assistant";

    include "$racine/vue/entete.html.php";


    $Intervention = new Intervention();

    $interventions = $Intervention->getAllInterventions();

    $Technicien = new Technicien();
    $techniciens = $Technicien->getAllTechniciens();

    //par defaut c'est 0 (Choisir technicien)
    $numTechnicienRecherche = 0;
    //par defaut c'est "" (aucune date)
    $dateRecherche = "";

    // si on clique sur le bouton "Rechercher"
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //je fais intval($_POST['numTechnicien']) car le numTechnicien dans la value du select est un string 
        //c'est pour le convertir en int et pouvoir faire la requete sql
        $numTechnicienRecherche = intval($_POST['numTechnicien']);
        // var_dump($_POST['numTechnicien']); //string
        // var_dump(intval($_POST['numTechnicien'])); //int

        $dateRecherche = $_POST['date'];

        //si un technicien et une date a été choisi
        if ($numTechnicienRecherche != 0 && !empty($dateRecherche)){

            $interventions = $Intervention->getInterventionsByEmployeNumMatriculeAndDate($numTechnicienRecherche, $dateRecherche);

        }
        else{

            //si c'est 0 c'est que c'est l'option "Choisir technicien" et qu'aucun technicien a été choisi
            if ($numTechnicienRecherche != 0){
            
                $interventions = $Intervention->getInterventionsByEmployeNumMatricule($numTechnicienRecherche);
            } 

            //si c'est empty ("") c'est qu'aucune date n'a été choisie
            if(!empty($dateRecherche)){
                $interventions = $Intervention->getInterventionsByDate($dateRecherche);
            }
            
        } 
            
    }

    include "$racine/vue/vueListeInterventionsAssistant.php";
    // include "./vue/vueListeInterventionsAssistant.php";

}
else if($role=="Technicien"){
    $titre = "Connexion";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.html.php";
    exit();
}else{
    $titre = "Connexion";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.html.php";
    exit();
}

include "$racine/vue/pied.html.php";
?>