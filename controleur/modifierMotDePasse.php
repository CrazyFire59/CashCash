<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

if (isset($_SESSION['username'])) {

    include_once "$racine/modele/connexion.inc.php";


        $titre = "Modifier mot de passe";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/vueModifierMotDePasse.php";

        if(isset($_POST['ancienMotDePasse']) && isset($_POST['nouveauMotDePasse']) && isset($_POST['nouveauMotDePasse2'])){
            $ancienmdp = $_POST['ancienMotDePasse'];
            $nouveauMotDePasse = $_POST['nouveauMotDePasse'];
            $nouveauMotDePasse2 = $_POST['nouveauMotDePasse2'];
            if($nouveauMotDePasse != $nouveauMotDePasse2){
                echo "Les deux mots de passe ne sont pas identiques";
            }else{
                $newmdp = $connexionModel->modifierPassword($ancienmdp,$nouveauMotDePasse);
                if($newmdp){
                    echo "Mot de passe modifie avec succes";
                }
            }
        }
        
        include "$racine/vue/pied.html.php";
    }else{
        include "$racine/controleur/deconnexion.php";
        exit();
    }
?>