<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/connexion.inc.php";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $loginResult = $connexionModel->login($username, $password);

        if ($loginResult) {
            header("Location: ./?action=profil");
        } else {
            $titre = "Connexion";
            include "$racine/vue/vueConnexion.php";
            echo "Nom d'utilisateur ou mot de passe incorrect.";
            include "$racine/vue/pied.html.php";
        }
    }else{
        $titre = "Connexion";
            include "$racine/vue/vueConnexion.php";
            include "$racine/vue/pied.html.php";
    }
if (isset($_GET['action']) && $_GET['action'] == "logout") {
    $connexionModel->logout();
    include "$racine/controleur/deconnexion.php";
    exit();
}
?>

