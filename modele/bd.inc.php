
<?php


    class Bdd {

        /*private $login = "root";
        private $mdp = "";
        private $bd = "cashcash";
        private $serveur = "127.0.0.1";*/
        private string $_dbName = "cashcash";
        private string $_dbUser = "root";
        private string $_dbPwd = "";
        
        protected function connexionPDO(){
            
            try {
                // $bdd = new PDO("mysql:host=".$this->$serveur.";dbname=".$this->$bd, $this->$login, $this->$mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
                $bdd = new PDO('mysql:host=127.0.0.1;dbname='.$this->_dbName.';charset=utf8', $this->_dbUser, $this->_dbPwd);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $bdd;
            } catch (PDOException $e) {
                echo "erreur : " . $e->getMessage();
            }

        }

    }
    
?>
