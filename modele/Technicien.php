<?php

/**
 * La classe Technicien gère les opérations liées aux techniciens.
 * Elle permet de récupérer des informations sur les techniciens enregistrés dans la base de données.
 * 
 * @package    CashCash
 * @subpackage Modele
 * @version    1.0
 * @since      2024-05-20
 */
class Technicien extends Bdd{

    /**
     * Récupère toutes les informations sur les techniciens.
     *
     * @return array Les informations sur les techniciens.
     */
    function getAllTechniciens(){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
        "SELECT * FROM technicien t
        INNER JOIN employe e ON t.employe_num_matricule = e.employe_num_matricule"
        );

        $req->execute();

        $techniciens = $req->fetchAll();

        return $techniciens;
    }

    /**
     * Récupère les informations sur un technicien spécifique en fonction de son numéro de matricule.
     *
     * @param int $numTech Le numéro de matricule du technicien.
     * @return array Les informations sur le technicien spécifique.
     */
    function getTechnicienByNumTech($numTech){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
        "SELECT * FROM technicien t
        INNER JOIN employe e ON t.employe_num_matricule = e.employe_num_matricule
        WHERE t.employe_num_matricule = :numTech"
        );

        $req->bindValue(":numTech", $numTech, PDO::PARAM_INT);

        $req->execute();

        $technicien = $req->fetch();

        return $technicien;
    }

    /**
     * Récupère toutes les informations sur les techniciens travaillant dans la même agence qu'un client spécifique.
     *
     * @param int $numAgenceOfClient Le numéro d'agence du client.
     * @return array Les informations sur les techniciens travaillant dans la même agence que le client.
     */
    function getAllTechniciensInSameAgencyAsClient($numAgenceOfClient){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
        "SELECT * FROM technicien t
        INNER JOIN employe e ON t.employe_num_matricule = e.employe_num_matricule
        WHERE t.agence_num = :numAgenceOfClient"
        );

        $req->bindValue(":numAgenceOfClient", $numAgenceOfClient, PDO::PARAM_INT);

        $req->execute();

        $techniciens = $req->fetchAll();

        return $techniciens;
    }

        /*function getAllInterventions(){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT * 
            FROM intervention i 
            INNER JOIN client c ON i.client_num = c.client_num
            INNER JOIN employe e ON i.employe_num_matricule = e.employe_num_matricule"
        );

        $req->execute();

        $interventions = $req->fetchAll();

        return $interventions;
    }*/

    /*function getTechnicienById($employeNum){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT * 
            FROM technicien t         
            INNER JOIN employe e ON t.employe_num_matricule = e.employe_num_matricule
            WHERE i.intervention_id = :idIntervention"
        );

        $req->bindValue(":employeNum", $employeNum, PDO::PARAM_INT);

        $req->execute();

        $intervention = $req->fetch();

        return $intervention;
    }*/

    /**
     * Récupère le numéro de matricule de l'utilisateur actuellement connecté.
     *
     * @return int Le numéro de matricule de l'utilisateur connecté.
     */
    function getMatriculebyUsername(){
        $username = $_SESSION['username'];
        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT employe_num_matricule
            FROM utilisateur
            WHERE username = :username"
        );
        $req->bindValue(":username", $username, PDO::PARAM_STR);
        $req->execute();
        $matricule = $req->fetch();
        return $matricule[0];
    }  

}
?>
