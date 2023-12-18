<?php
include('Bdd.php');
$bdd = new Bdd();
class ConnexionModel {
    private $bdd;

    public function __construct($bddInstance) {
        $this->bdd = $bddInstance;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login($username, $password) {
        $query = "SELECT * FROM utilisateur WHERE username = :username AND password = :password";
        $statement = $this->bdd->connexionPDO()->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            //session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['roleID'];
            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        //session_start();
        $_SESSION = array();
        session_destroy();
    }

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
    public function getRole($role) {
        
        $query = "SELECT roleID FROM utilisateur WHERE roleID = :roleID";
        $statement = $this->bdd->prepare($query);
        $statement->bindParam(':roleID', $role);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['roleID'];
    }

    public function isLoggedOn() {
        //session_start();
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }
    }
}

$connexionModel = new ConnexionModel($bdd);
?>
