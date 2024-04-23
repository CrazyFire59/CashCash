<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/Bdd.php";
include_once "$racine/modele/AffecterVisite.php";

if (isset($_SESSION["role"]) == 1){
    $titre = "Affecter Visite";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAffecterVisite.php";
    if (isset($_POST['intervention_date']) && isset($_POST['intervention_heure']) && isset($_POST['client_num']) && isset($_POST['employe_num_matricule'])) {
        if ($AffecterVisite->getAffecterVisite($_POST['intervention_date'], $_POST['intervention_heure'], $_POST['client_num'], $_POST['employe_num_matricule'])) {
            echo "Visite affecté avec succées !";
            echo '<br><a target="_blank" href="./?action=genererPDF">Generer PDF</a>';
            header("Location: ./?action=selectionMateriel&client_num=" . $_POST['client_num'] . "&intervention_date=" . $_POST['intervention_date'] . "&intervention_heure=" . $_POST['intervention_heure']. "&employe_num_matricule=" . $_POST['employe_num_matricule']);
    }   else {
            echo "Visite non affecté !";
    }
    }


    include "$racine/vue/pied.html.php"; 
}else{
    include "$racine/controleur/deconnexion.php";
    exit();
}


?>