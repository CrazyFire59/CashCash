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

$materiels = $Intervention->getAllMaterielFromIntervention($idIntervention);

if(isset($_POST['valider'])){
    foreach($materiels as $materiel){
        $commentaire = $_POST['' . $materiel["materiel_num_serie"]  . "commentaire" . ''];
        $tempsPasse = $_POST['' . $materiel["materiel_num_serie"]  . "temps" . ''];
        $numMateriel = $_POST['' . $materiel["materiel_num_serie"] . ''];
        $Intervention->ValiderIntervention($numMateriel, $idIntervention, $tempsPasse, $commentaire);
    }
     header("Location: ./?action=listeInterventionsTechnicien");
}


include "$racine/vue/vueValiderIntervention.php";

include "$racine/vue/pied.html.php";

?>