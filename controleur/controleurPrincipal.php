<?php

/**
 * Cette fonction contrôle la navigation principale de l'application en déterminant quel fichier inclure en fonction de l'action demandée.
 * Elle associe des actions spécifiques à des scripts correspondants et retourne le script à inclure.
 * Si l'action demandée n'existe pas, elle retourne le script par défaut.
 * 
 * @param string $action L'action demandée par l'utilisateur.
 * @return string Le chemin du script correspondant à l'action ou le script par défaut si l'action n'est pas définie.
 * 
 * @package    CashCash
 * @subpackage Controleur
 * @version    1.0
 * @since      2024-05-20
 */
function controleurPrincipal($action) {
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
    $lesActions["affecterVisite"] = "AffecterVisite.php";
    $lesActions["validerintervention"] = "validerIntervention.php";
    $lesActions["visualiserclient"] = "VisualiserClient.php";
    $lesActions["modifierClient"] = "modifierClient.php";
    $lesActions["genererPDF"] = "genererPDF.php";
    $lesActions["selectionMateriel"] = "selectionMateriel.php";

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}
?>
