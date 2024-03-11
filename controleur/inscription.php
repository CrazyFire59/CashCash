<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
if(isset($_SESSION['role']) == 4){   
include_once "$racine/modele/inscription.inc.php";

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $matricule = $_POST['matricule'];
        $role = $_POST['role'];

        if($inscription->dejaInscrit($username, $matricule)){
            $inscriptionResult = false;
        }else{
            $inscription->inscription($username, $password, $matricule, $role);
            $titre = "Inscription";
            include "$racine/vue/entete.html.php";
            include "$racine/vue/vueInscription.php";
            echo "Inscription de l'utilisateur ".$username." reussie.";
            include "$racine/vue/pied.html.php";
        }

        if ($loginResult = false) {
            $titre = "Inscription";
            include "$racine/vue/entete.html.php";
            include "$racine/vue/vueInsciption.php";
            echo "l'utilisateur existe deja.";
            include "$racine/vue/pied.html.php";
        }
    }else{
        $titre = "Inscription";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/vueInscription.php";
        include "$racine/vue/pied.html.php";
    }
}else{
    header("Location: $racine/index.php");
}
?>