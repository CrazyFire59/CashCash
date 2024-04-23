<main id="vue-listeinterventions-assistant">
    
    <h1>Gestion des Interventions</h1>

    <form action="" method="POST" class="options-recherche">

        <div class="technicien">
            <label for="techniciens">Rechercher par technicien</label>
            <select name="numTechnicien" id="techniciens">
                <option value="0">
                    Choisir technicien
                </option>
                <?php foreach ($techniciens as $technicien): ?>
                    <option value="<?= $technicien["employe_num_matricule"]?>" <?= $numTechnicienRecherche == $technicien["employe_num_matricule"] ? 'selected' : '' ?>>
                        <?= $technicien["employe_prenom"]?> <?= $technicien["employe_nom"]?>
                    </option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="date">
            <label for="date">Rechercher par date</label>
            <input type="date" name="date" id="date" value=<?= $dateRecherche ?>>
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
                <th>PDF</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($interventions) !== 0): ?>
                <?php foreach ($interventions as $intervention): ?>
                    <tr>
                        <td>N°<?= $intervention["intervention_id"] ?></td>
                        <td><?= $intervention["intervention_date"] ?></td>
                        <td><?= $intervention["intervention_heure"] ?></td>
                        <td><?= $intervention["employe_prenom"] ?> <?= $intervention["employe_nom"] ?></td>
                        <td><a href="./?action=editIntervention&interventionId=<?=$intervention["intervention_id"]?>">Editer</a></td>
                        <td><a target="_blank" href="./?action=genererPDF&interventionId=<?=$intervention["intervention_id"]?>">PDF</a></td>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">
                        <?php if ($numTechnicienRecherche != 0 && !empty($dateRecherche)): ?>
                            Pas d'interventions pour le technicien <?= $Technicien->getTechnicienByNumTech($numTechnicienRecherche)["employe_prenom"].' '.$Technicien->getTechnicienByNumTech($numTechnicienRecherche)["employe_nom"] ?> le <?= $dateRecherche ?>
                        <?php elseif ($numTechnicienRecherche != 0): ?>
                            Pas d'interventions pour le technicien <?= $Technicien->getTechnicienByNumTech($numTechnicienRecherche)["employe_prenom"].' '.$Technicien->getTechnicienByNumTech($numTechnicienRecherche)["employe_nom"] ?>
                        <?php elseif (!empty($dateRecherche)): ?>
                            Pas d'interventions le <?= $dateRecherche ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>  
        </tbody>
    </table>

</main>

