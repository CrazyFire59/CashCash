<?php

include_once "bd.inc.php";
function login($username, $password) {
        global $bdd;

        // Requête pour récupérer le hachage du mot de passe de l'utilisateur
        $query = $bdd->prepare('SELECT password FROM utilisateur WHERE username = :username');
        $query->bindParam(':username', $username);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Requête pour récupérer le numéro de l'utilisateur connexté
        $queryToGetNum = $bdd->prepare('SELECT employe_num_matricule FROM utilisateur WHERE username = :username');
        $queryToGetNum->bindParam(':username', $username);
        $queryToGetNum->execute();
        $NumOfLoggedUser = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $hashedPassword = $result['password'];

            // Vérification du hachage du mot de passe
            if (password_verify($password, $hashedPassword)) {
                // L'utilisateur est authentifié avec succès
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;


                $_SESSION['userNum'] = $NumOfLoggedUser;

                //quand on fait var_dump($_SESSION); il n'y a que $_SESSION['username'] et $_SESSION['role']

                return true;
            } else {
                // Mot de passe incorrect
                return false;
            }
        } else {
            // Utilisateur non trouvé
            return false;
        }
    }

function logout() {
        session_destroy();
    }

function isLoggedOn() {
        return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
    }
?>