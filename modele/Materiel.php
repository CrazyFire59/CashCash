<?php

class Materiel extends Bdd{

    function getInterventionMateriels($interventionId){

        $conn = $this->connexionPDO();

        $req = $conn->prepare(
            "SELECT * FROM interventionmateriel im
            INNER JOIN intervention i ON i.intervention_id = im.intervention_id
            INNER JOIN materiel m ON m.materiel_num_serie = im.materiel_num_serie
            INNER JOIN materiel_type mt ON mt.materiel_type_id = m.materiel_type_id
            WHERE i.intervention_id = $interventionId"
        );

        $req->execute();

        $materiels = $req->fetchAll();

        return $materiels;
    }

}

?>
