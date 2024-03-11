<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $matricule = $_POST['matricule'];
    $role = $_POST['role'];
    
}


$bddInscription = new Bdd();
class Inscription {
    private $bdd;

    public function __construct($bddInstance) {
        $this->bdd = $bddInstance;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function inscription($username, $password, $matricule, $role) {
        $query = "INSERT INTO utilisateur ( username, password, employe_num_matricule, roleID) VALUES (:username, :password, :matricule, :role)";
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
$inscription = new Inscription ($bddInscription);
?>
