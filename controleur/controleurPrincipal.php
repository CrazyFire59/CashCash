<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "connexion.php";
    //$lesActions["liste"] = "ctrIntervention.php";
    //$lesActions["detail"] = "detailResto.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["listeClient"] = "listeClient.php";
    $lesActions["outiStat"] = "outiStatistique.php";

    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>