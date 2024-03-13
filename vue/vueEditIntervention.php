<main id="vue-editintervention-assistant">

    <h1>Modification de l'intervention n°<?= $intervention["intervention_id"] ?></h1>

    <form action="" method="POST">

        <table>
            <thead>
                <tr>
                    <th>Numéro Intervention</th>
                    <th>Date Intervention</th>
                    <th>Heure Intervention</th>
                    <th>Technicien</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $intervention["intervention_id"] ?></td>
                    <td><input type="date" name="date" value="<?= $date ?>" class="date"></td>
                    <td><input type="time" name="heure" value="<?= $heure ?>" class="time"></td>
                    <td>
                        <select name="numTechnicien" id="techniciens">
                            <!-- <option value="0">
                                Aucun technicien
                            </option> -->
                            <?php foreach ($techniciensDansMemeAgenceQueClient as $technicien): ?>
                                <option value="<?= $technicien["employe_num_matricule"]?> <?= $intervention["employe_num_matricule"] == $technicien["employe_num_matricule"] ? "selected" : "" ?>">
                                    <?= $technicien["employe_prenom"]?> <?= $technicien["employe_nom"]?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        <h2>Materiels</h2>

        <table>
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Nom</th>
                    <th>Emplacement</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $intervention["intervention_id"] ?></td>
                    <td><input type="date" name="date" value="<?= $date ?>" class="date"></td>
                    <td><input type="time" name="heure" value="<?= $heure ?>" class="time"></td>
                    <td>
                        <select name="numTechnicien" id="techniciens">
                            <!-- <option value="0">
                                Aucun technicien
                            </option> -->
                            <?php foreach ($techniciensDansMemeAgenceQueClient as $technicien): ?>
                                <option value="<?= $technicien["employe_num_matricule"]?> <?= $intervention["employe_num_matricule"] == $technicien["employe_num_matricule"] ? "selected" : "" ?>">
                                    <?= $technicien["employe_prenom"]?> <?= $technicien["employe_nom"]?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        <input type="submit" value="Modifier l'intervention" class="btn-valider-intervention">

        <!-- snackbar -->
        <!-- <button type="submit" class="btn-valider-intervention">Modifier l'intervention</button> -->
        <!-- <button class="btn btn-lg" onclick="myFunction()">Show Snackbar</button> -->

        <!-- The actual snackbar -->
        <!-- <div id="snackbar">Intervention modifiée</div> -->
    
    </form>

</main>