<?php

/**
 * Ce script gère la modification du mot de passe d'un utilisateur connecté.
 * Il vérifie si l'utilisateur est connecté, affiche le formulaire de modification de mot de passe,
 * traite les données soumises, et met à jour le mot de passe si les conditions sont remplies.
 * 
 * @package    CashCash
 * @subpackage controleur
 * @version    1.0
 * @since      2024-05-20
 */

// Vérifie si le script est appelé directement
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['username'])) {

    // Inclusion du modèle de connexion
    include_once "$racine/modele/connexion.inc.php";

    // Définition du titre de la page
    $titre = "Modifier mot de passe";
    
    // Inclusion de l'en-tête de la page
    include "$racine/vue/entete.html.php";
    
    // Inclusion de la vue pour la modification du mot de passe
    include "$racine/vue/vueModifierMotDePasse.php";

    // Vérifie si les champs du formulaire de modification de mot de passe sont soumis
    if (isset($_POST['ancienMotDePasse']) && isset($_POST['nouveauMotDePasse']) && isset($_POST['nouveauMotDePasse2'])) {
        $ancienmdp = $_POST['ancienMotDePasse'];
        $nouveauMotDePasse = $_POST['nouveauMotDePasse'];
        $nouveauMotDePasse2 = $_POST['nouveauMotDePasse2'];

        // Vérifie si les nouveaux mots de passe sont identiques
        if ($nouveauMotDePasse != $nouveauMotDePasse2) {
            echo "Les deux mots de passe ne sont pas identiques";
        } else {
            // Modifie le mot de passe
            $newmdp = $connexionModel->modifierPassword($ancienmdp, $nouveauMotDePasse);
            if ($newmdp) {
                echo "Mot de passe modifié avec succès";
            }
        }
    }

    // Inclusion du pied de page
    include "$racine/vue/pied.html.php";
} else {
    // Si l'utilisateur n'est pas connecté, le déconnecte et termine le script
    include "$racine/controleur/deconnexion.php";
    exit();
}
?>
