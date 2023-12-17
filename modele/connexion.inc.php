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
            $_SESSION['job'] = $user['employe_num_matricule'];
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

    public function getUsername($userID) {
        $query = "SELECT username FROM utilisateurs WHERE id = :userID";
        $statement = $this->bdd->prepare($query);
        $statement->bindParam(':userID', $userID);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['username'];
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
