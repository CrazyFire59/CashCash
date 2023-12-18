<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/connexion.inc.php";
//$user->getUsername($_SESSION["username"]); 
//$role->getRole($_SESSION["role"]);
// Vérifier si l'utilisateur est connecté
if ($connexionModel->isLoggedOn()) {
    //$user = getUtilisateur($_SESSION["username"]);
    /*
    $role = $user->getRole();
    echo $role;
    
    $username = $user->getUsername();
    */
    if($_SESSION["role"]==1){
        $role = "Assistant";
    }else if($_SESSION["role"]==2){
        $role = "Agent";
    }else if($_SESSION["role"]==3){
        $role = "Technicien";
    }else{
        $role = "Inconnu";
    } 

    
    // Si l'utilisateur est connecté, inclure les informations de profil
    include "$racine/vue/entete.html.php";
    echo "<h1 class='profil'>Bonjour ", $role ," " , $connexionModel->getFullNameFromUsername($_SESSION["username"]) , "</h1>";
    if($role=="Assistant"){
        include "$racine/vue/vueMonProfilAssistant.php";
    }else if($role=="Agent"){
        include "$racine/vue/vueMonProfilAgent.php";
    }else if($role=="Technicien"){
        include "$racine/vue/vueMonProfilTechnicien.php";
    }else{
        include "$racine/vue/vueMonProfil.php";
    }
    include "$racine/vue/pied.html.php";  
    
}else{
    // Si l'utilisateur n'est pas connecté, afficher le formulaire de connexion
    $titre = "Connexion";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.html.php";
    exit(); // Arrêter l'exécution pour afficher le formulaire de connexion
}


?>
