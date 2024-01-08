<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/OutilStat.inc.php";
if ($connexionModel->isLoggedOn()) {
    if($_SESSION["role"]==1){
        $role = "Assistant";
    }else if($_SESSION["role"]==2){
        $role = "Agent";
    }else if($_SESSION["role"]==3){
        $role = "Technicien";
    }else{
        $role = "Inconnu";
    } 

    if($role=="Assistant"){
        include "$racine/vue/vueOutilStatistique.php";
        include "$racine/vue/pied.html.php";  
    }else if($role=="Agent"){
        $titre = "Connexion";
        include "$racine/vue/vueConnexion.php";
        include "$racine/vue/pied.html.php";
        exit();
    }else if($role=="Technicien"){
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
    
}else{
    // Si l'utilisateur n'est pas connecté, afficher le formulaire de connexion
    $titre = "Connexion";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.html.php";
    exit(); // Arrêter l'exécution pour afficher le formulaire de connexion
}
?>

