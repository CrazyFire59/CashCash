<main id="vue-listeinterventions-assistant">
    
    <h1>Gestion des Interventions</h1>

    <form action="" method="POST" class="options-recherche">

        <div class="technicien">
            <label for="techniciens">Rechercher par techniciens</label>
            <select name="numTechnicien" id="techniciens">
                <option value="0">
                    Choisir technicien
                </option>
                <?php foreach ($techniciens as $technicien): ?>
                    <option value="<?= $technicien["employe_num_matricule"]?>">
                        <?= $technicien["employe_prenom"]?> <?= $technicien["employe_nom"]?>
                    </option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="date">
            <label for="date">Rechercher par date</label>
            <input type="date" name="date" id="date">
        </div>

        <input type="submit" value="Rechercher">

    </form> 

    <table>
        <thead>
            <tr>
                <th>Numéro Intervention</th>
                <th>Date Intervention</th>
                <th>Heure Intervention</th>
                <th>Technicien</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($interventions as $intervention): ?>
                <tr>
                    <td>N°<?= $intervention["intervention_id"] ?></td>
                    <td><?= $intervention["intervention_date"] ?></td>
                    <td><?= $intervention["intervention_heure"] ?></td>
                    <td><?= $intervention["employe_prenom"] ?> <?= $intervention["employe_nom"] ?></td>
                    <td><a href="vueIntervention.php?id=<?=$intervention["intervention_id"]?>">Editer</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

