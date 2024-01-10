<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/OutilStat.inc.php";

if(isset($_SESSION["role"])){
    if($_SESSION["role"]==1){
        $role = "Assistant";
    }else if($_SESSION["role"]==2){
        $role = "Agent";
    }else if($_SESSION["role"]==3){
        $role = "Technicien";
    }else{
        $role = "Inconnu";
    } 
}else{
    $role = "Inconnu";
}
    


    if($role=="Assistant"){
        $titre = "Outil statistique";
        include "$racine/vue/entete.html.php";
                
            $rechercheMA=0;
        if(isset($_POST['month'])){
            $rechercheMA = $_POST['month'].'-01';
            $stat = $outilStat->getstatmois($rechercheMA);
            $moisetannee = $_POST['month'];
        }else{
            $stat = $outilStat->getstatdumois();
            $moisetannee = $outilStat->getmoisetannee();
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
?>

