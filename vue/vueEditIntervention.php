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
                                <?php foreach ($allMaterielsType as $materielType): ?>
                                    <option value="<?= $materielType["materiel_type_id"] ?>">
                                        <?= $materielType["materiel_type_libelle"] ?>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <input type="submit" name="modifier" value="Modifier l'intervention" class="btn-valider-intervention">
    
    </form>

</main>