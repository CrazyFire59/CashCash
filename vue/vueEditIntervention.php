<main id="vue-editintervention-assistant">

    <h1>Modification de l'intervention n°<?= $intervention["intervention_id"] ?></h1>

    <form action="" method="POST">

        <table>
            <thead>
                <tr>
                    <th>Numéro Intervention</th>
                    <th>Date Intervention</th>
                    <th>Heure Intervention</th>
                    <th>N° Client</th>
                    <th>Technicien</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $intervention["intervention_id"] ?></td>
                    <td><input type="date" name="date" value="<?= $date_intervention ?>" class="date"></td>
                    <td><input type="time" name="heure" value="<?= $heure_intervention ?>" class="time"></td>
                    <td><?= $intervention["client_num"] ?></td>
                    <td>
                        <select name="numTechnicien" id="techniciens">
                            <option value="<?= $intervention["employe_num_matricule"] ?>">
                                <?= $intervention["employe_prenom"] .' '. $intervention["employe_nom"] ?>
                            </option>
                            <?php foreach ($techniciensDansMemeAgenceQueClient as $technicien): ?>
                                <option value="<?= $technicien["employe_num_matricule"] ?>">
                                    <?= $technicien["employe_prenom"]?> <?= $technicien["employe_nom"]?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <input type="submit" name="modifier" value="Modifier">
        <br><br>
        <h2>Materiels</h2>

        <table>
            <thead>
                <tr>
                    <th>N° Série (id)</th>
                    <th>Référence</th>
                    <th>Nom</th>
                    <th>Emplacement</th>
                    <th>Date de vente</th>
                    <th>Date installation</th>
                    <th>Prix de vente</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($materielsOfIntervention as $materiel): ?>
                    <tr>
                        <td><?= $materiel["materiel_num_serie"] ?></td>
                        <td><?= $materiel["materiel_type_reference"] ?></td>
                        <td><?= $materiel["materiel_type_libelle"] ?></td>
                        <td><?= $materiel["materiel_emplacement"] ?></td>
                        <td><?= date("Y-m-d", strtotime($materiel["materiel_date_vente"])) ?></td>
                        <td><?= date("Y-m-d", strtotime($materiel["materiel_date_installation"])) ?></td>
                        <td><?= $materiel["materiel_prix_vente"] ?></td>
                        <td><input type="submit" name="supprimer<?= $materiel["materiel_num_serie"] ?>" value="Supprimer"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
    
    <h2>Ajout d'un materiel</h2>
    <br>

    <form action="" method="post">
        <label for="materiel_type_id">Selectionner le num du matériel :</label>
        <div>
            <select name="materiel_num_serie">
                <?php foreach ($allMaterielsOfClient as $materielOfClient): ?>
                    <option value="<?= $materielOfClient["materiel_num_serie"] ?>">
                        <?= $materielOfClient["materiel_num_serie"] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div><br>

        <input type="submit" name="add" value="Ajouter le matériel">
    </form>
    

</main>