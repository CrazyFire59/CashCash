<main id="vue-listeinterventions-technicien">
    
    <h1>Vos Interventions</h1>

    <table>
        <thead>
            <tr>
                <th>Numéro Intervention</th>
                <th>Date Intervention</th>
                <th>Heure Intervention</th>
                <th>Valider intervention</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($interventionsTechnicien as $intervention): ?>
                <tr>
                    <td>N°<?= $intervention["intervention_id"] ?></td>
                    <td><?= $intervention["intervention_date"] ?></td>
                    <td><?= $intervention["intervention_heure"] ?></td>
                    <td><a href="./?action=editIntervention&interventionId=<?=$intervention["intervention_id"]?>">Valider</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

