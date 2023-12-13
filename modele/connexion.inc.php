<?php

include_once "bd.inc.php";
function login($username, $password) {
        global $bdd;

        // Requête pour récupérer le hachage du mot de passe de l'utilisateur
        $query = $bdd->prepare('SELECT password FROM utilisateur WHERE username = :username');
        $query->bindParam(':username', $username);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $hashedPassword = $result['password'];

            // Vérification du hachage du mot de passe
            if (password_verify($password, $hashedPassword)) {
                // L'utilisateur est authentifié avec succès
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
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