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
                        <td>
                            <select name="materiel_type<?= $materiel["materiel_num_serie"] ?>" id="">
                                <option value="<?= $materiel["materiel_type_id"] ?>">
                                    <?= $materiel["materiel_type_libelle"] ?>
                                </option>
                                <?php foreach ($allMaterielsOfClient as $materielOfClient): ?>
                                    <option value="<?= $materielOfClient["materiel_type_id"] ?>">
                                        <?= $materielOfClient["materiel_type_libelle"] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td> 
                            <input name="materiel_emplacement<?= $materiel["materiel_num_serie"] ?>" value="<?= $materiel["materiel_emplacement"] ?>">
                        </td>
                        <!-- date("Y-m-d", strtotime()) car la date est sous le format date heure (datetime) -->
                        <td> 
                            <input name="materiel_date_vente<?= $materiel["materiel_num_serie"] ?>" value="<?= date("Y-m-d", strtotime($materiel["materiel_date_vente"])) ?>" type="date">
                        </td>
                        <td> 
                            <input name="materiel_date_installation<?= $materiel["materiel_num_serie"] ?>" value="<?= date("Y-m-d", strtotime($materiel["materiel_date_installation"])) ?>" type="date">
                        </td>
                        <td> 
                            <input name="materiel_prix_vente<?= $materiel["materiel_num_serie"] ?>" value="<?= $materiel["materiel_prix_vente"] ?>">
                        </td>
                        <td> 
                            <input type="submit" name="supprimer<?= $materiel["materiel_num_serie"] ?>" value="Supprimer">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <input type="submit" name="modifier" value="Modifier l'intervention" class="btn-valider-intervention">
    
        <h2>Ajout d'un materiel</h2>

        <form action="" method="post">
            <label for="materiel_date_vente">Date de vente :</label>
            <input type="date" name="materiel_date_vente" id="materiel_date_vente" required><br>

            <label for="materiel_date_installation">Date d'installation :</label>
            <input type="date" name="materiel_date_installation" id="materiel_date_installation" required><br>

            <label for="materiel_prix_vente">Prix de vente :</label>
            <input type="text" name="materiel_prix_vente" id="materiel_prix_vente" required><br>

            <label for="materiel_emplacement">Emplacement :</label>
            <input type="text" name="materiel_emplacement" id="materiel_emplacement" required><br>

            <label for="contrat_num">Numéro du contrat :</label>
            <input type="number" name="contrat_num" id="contrat_num"><br>

            <label for="materiel_type_id">Nom du matériel :</label>
            <div>
                <select name="materiel_type_id">
                    <?php foreach ($allMaterielsOfClient as $materielOfClient): ?>
                        <option value="<?= $materielOfClient["materiel_type_id"] ?>">
                            <?= $materielOfClient["materiel_type_libelle"] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="submit" name="add" value="Ajouter le matériel">
        </form>


    </form>

</main>