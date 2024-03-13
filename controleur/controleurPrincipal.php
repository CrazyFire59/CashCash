<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "connexion.php";
    $lesActions["listeInterventionsAssistant"] = "listeInterventionsAssistant.php";
    $lesActions["listeInterventionsTechnicien"] = "listeInterventionsTechnicien.php";
    $lesActions["editIntervention"] = "editIntervention.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["RechercheClient"] = "RechercheClient.php";
    $lesActions["outilStat"] = "outiStatistique.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["modifiermotdepasse"] = "modifierMotDePasse.php";
    $lesActions["affecterVisite"] = "affecterVisite.php";
    $lesActions["validerintervention"] = "validerIntervention.php";
    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>