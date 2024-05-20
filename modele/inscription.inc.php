<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $matricule = $_POST['matricule'];
    $role = $_POST['role'];
    
}

$bddInscription = new Bdd();

/**
 * La classe Inscription gère les opérations liées à l'inscription des utilisateurs.
 * Elle permet d'ajouter de nouveaux utilisateurs dans la base de données et de vérifier
 * si un utilisateur est déjà inscrit.
 * 
 * @package    cashcash
 * @subpackage Modele
 * @version    1.0
 * @since      2024-05-20
 */
class Inscription {
    /**
     * Instance de la base de données.
     * @var Bdd
     */
    private $bdd;

    /**
     * Constructeur de la classe Inscription.
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
     * Fonction d'inscription d'un nouvel utilisateur.
     * @param string $username Nom d'utilisateur.
     * @param string $password Mot de passe (haché).
     * @param string $matricule Matricule de l'employé.
     * @param int $role ID du rôle de l'utilisateur.
     * @return bool true si l'inscription est réussie, sinon false.
     */
    public function inscription($username, $password, $matricule, $role) {
        $query = "INSERT INTO utilisateur (username, password, employe_num_matricule, roleID) VALUES (:username, :password, :matricule, :role)";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':matricule', $matricule);
        $statement->bindParam(':role', $role);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    /**
     * Vérifie si un utilisateur est déjà inscrit.
     * @param string $username Nom d'utilisateur.
     * @param string $matricule Matricule de l'employé.
     * @return bool true si l'utilisateur est déjà inscrit, sinon false.
     */
    public function dejaInscrit($username, $matricule) {
        $query = "SELECT * FROM utilisateur WHERE username = :username AND employe_num_matricule = :matricule";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':matricule', $matricule);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if($result){
            return true;
        }else{
            return false;
        }
    }

}

// Instance de Inscription
$inscription = new Inscription($bddInscription);
?>
