<?php
include('Bdd.php');

/**
 * Le modèle de connexion gère les opérations liées à l'authentification des utilisateurs.
 * Il permet de connecter les utilisateurs, de modifier leur mot de passe, de les déconnecter,
 * et de récupérer des informations sur leur session.
 * 
 * @package    CashCash
 * @subpackage Modele
 * @version    1.0
 * @since      2024-05-20
 */
$bddConnexion = new Bdd();
class ConnexionModel {
    /**
     * Instance de la base de données.
     * @var Bdd
     */
    private $bdd;

    /**
     * Constructeur de la classe ConnexionModel.
     * @param Bdd $bddInstance Instance de la base de données.
     */
    public function __construct($bddInstance) {
        $this->bdd = $bddInstance;
        // Démarrage de la session si elle n'est pas déjà démarrée
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Fonction de connexion d'un utilisateur.
     * @param string $username Nom d'utilisateur.
     * @param string $password Mot de passe.
     * @return bool true si la connexion est réussie, sinon false.
     */
    public function login($username, $password) {
        $query = "SELECT * FROM utilisateur WHERE username = :username";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['roleID'];
            return true;
        } else {
            return false;
        }
    }

    /**
     * Fonction de modification du mot de passe d'un utilisateur.
     * @param string $ancienPassword Ancien mot de passe.
     * @param string $nouveauPassword Nouveau mot de passe.
     * @return bool true si la modification est réussie, sinon false.
     */
    public function modifierPassword($ancienPassword, $nouveauPassword) {
        if (!$this->isLoggedOn()) {
            return false; 
        }
    
        $username = $_SESSION['username'];
    
        $query = "SELECT * FROM utilisateur WHERE username = :username";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    
        if (!password_verify($ancienPassword, $user['password'])) {
            return false;
        }
    
        $hashedPassword = password_hash($nouveauPassword, PASSWORD_DEFAULT);
    
        $query = "UPDATE utilisateur SET password = :password WHERE username = :username";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam(':username', $username);
        $success = $statement->execute();
    
        return $success;
    }

    /**
     * Fonction de déconnexion de l'utilisateur.
     */
    public function logout() {
        $_SESSION = array();
        session_destroy();
    }

    /**
     * Récupère le nom complet d'un utilisateur à partir de son nom d'utilisateur.
     * @param string $username Nom d'utilisateur.
     * @return string Le nom complet de l'utilisateur.
     */
    public function getFullNameFromUsername($username)
{
    $query = "SELECT employe_nom, employe_prenom FROM employe
              INNER JOIN utilisateur ON employe.employe_num_matricule = utilisateur.employe_num_matricule
              WHERE username = :username";
    $statement = $this->bdd->connexionPDO()->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result['employe_nom'] . " " . $result['employe_prenom'];
} 

    /**
     * Récupère le rôle d'un utilisateur.
     * @param int $role ID du rôle.
     * @return int ID du rôle de l'utilisateur.
     */
    public function getRole($role) {
        
        $query = "SELECT roleID FROM utilisateur WHERE roleID = :roleID";
        $statement = $this->bdd->prepare($query);
        $statement->bindParam(':roleID', $role);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['roleID'];
    }

    /**
     * Vérifie si un utilisateur est connecté.
     * @return bool true si l'utilisateur est connecté, sinon false.
     */
    public function isLoggedOn() {
        //session_start();
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }
    }
}

// Instance de ConnexionModel
$connexionModel = new ConnexionModel($bddConnexion);
?>
