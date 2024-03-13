<?php
class Bdd {
    private $_dbName = "CashCash";
    private $_dbUser = "CashCash";
    private $_dbPwd = "DT56gK_*p%-3ol2H";

    public function connexionPDO(){
        try {
            $dsn = 'mysql:host=185.207.226.14:3306;dbname=' . $this->_dbName . ';charset=utf8';
            $bdd = new PDO($dsn, $this->_dbUser, $this->_dbPwd);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdd;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            // Pour arrêter l'exécution en cas d'erreur de connexion :
            // die("Erreur de connexion : " . $e->getMessage());
            return null; // Retourne null en cas d'erreur
        }
    }

    // private $_dbName = "cashcash";
    // private $_dbUser = "root";
    // private $_dbPwd = "";

    // public function connexionPDO(){
    //     try {
    //         $dsn = 'mysql:host=127.0.0.1;dbname=' . $this->_dbName . ';charset=utf8';
    //         $bdd = new PDO($dsn, $this->_dbUser, $this->_dbPwd);
    //         $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         return $bdd;
    //     } catch (PDOException $e) {
    //         echo "Erreur : " . $e->getMessage();
    //         // Pour arrêter l'exécution en cas d'erreur de connexion :
    //         // die("Erreur de connexion : " . $e->getMessage());
    //         return null; // Retourne null en cas d'erreur
    //     }
    // }
}

?>
