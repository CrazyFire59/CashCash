
 <h1>Valider de l'intervention n°<?= $idIntervention ?></h1>

    <form action="" method="POST">

        <table>
            <thead>
                <tr>
                    <th>Numéro de Materiel</th>
                    <th>Commentaire Intervention</th>
                    <th>Temps passé</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    foreach ($materiels as $materiel) {
                        echo "<td>" . $materiel["materiel_num_serie"] . " <input type='hidden' id='" . $materiel["materiel_num_serie"]  . "' name='" . $materiel["materiel_num_serie"]  . "' value='" . $materiel["materiel_num_serie"]  . "' class='materiel'></td>";
                        echo "<td> <input type='text' id='" . $materiel["materiel_num_serie"]  . "commentaire" . "' name='" . $materiel["materiel_num_serie"]  . "commentaire" . "'  class='commentaire'> </td>";
                        echo "<td> <input type='time' id='" . $materiel["materiel_num_serie"]  . "temps" . "' name='" . $materiel["materiel_num_serie"]  . "temps" . "' class='temps'> </td>";
                    } 
                    ?>
                </tr>
            </tbody>
        </table>

        <input type="submit" name="valider" value="Valider Intervention" class="btn-valider-intervention">
    
    </form>
