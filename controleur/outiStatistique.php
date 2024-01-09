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
        $titre = "Outil statistique";
        include "$racine/vue/entete.html.php";
            $stat = $connexionModel->getstat();
            var_dump($stat);
            foreach($stat as $s)
            {
                echo $s['employe_num_matricule'];
                echo $s['nb_intervention'];
                echo $s['nb_km_parcourue'];
                echo $s['durée_passée_sur_matériel'];
            }
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

