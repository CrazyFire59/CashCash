<?php
include_once "../modele/bd.utilisateur.inc.php";
$username = 'test';

$user = getUtilisateurByUsername($username);
var_dump($user);
?>
