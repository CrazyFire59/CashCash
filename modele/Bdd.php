<?php
class Bdd {
    /* bdd hebergée */
    private $_dbName = "CashCash";
    private $_dbUser = "CashCash";
    private $_dbPwd = "DT56gK_*p%-3ol2H";
    /* en local */
    //private $_dbName = "cashcash";
    //private $_dbUser = "root";
    //private $_dbPwd = "";

    public function connexionPDO(){
        try {
            /* bdd hebergée */
            $dsn = 'mysql:host=185.207.226.14:3306;dbname=' . $this->_dbName . ';charset=utf8';
            /* en local */
            // $dsn = 'mysql:host=127.0.0.1;dbname=' . $this->_dbName . ';charset=utf8';
            $bdd = new PDO($dsn, $this->_dbUser, $this->_dbPwd);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdd;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return null; 
        }
    }
}

?>
