<?php

    public function getAllAgences(){

        $db = $this->connectDB();

        $requete = "SELECT * FROM agences";

        $statment = $db->prepare($requete);

        $statment->execute();

        $articles = $statment->fetchAll();

        return $agences;
    }

?>