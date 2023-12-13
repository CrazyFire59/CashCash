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

<?php

include_once "bd.utilisateur.inc.php";
//include_once "bd.inc.php";

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["username"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["username"])) {
        $util = getUtilisateurByUsername($_SESSION["username"]);
        if ($util["username"] == $_SESSION["username"] && $util["password"] == $_SESSION["password"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}




if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');


    // test de connexion
    login("test@bts.sio", "sio");
    if (isLoggedOn()) {
        echo "logged";
    } else {
        echo "not logged";
    }

    // deconnexion
    logout();
}
?>