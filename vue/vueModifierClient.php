<div class="titre">
            <h3>Modifier Client</h3>
        </div>
        <form action ="./?action=validerClient" method="post">
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
                    <td><?= $client["client_num"] ?></td>
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
            
            <p>
                <input type="submit" value="Valider" class="submit">
            </p>
        </form>
