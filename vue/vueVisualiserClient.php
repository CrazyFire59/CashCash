<div class="titre">
            <h3>Fiche de numero <?php echo $IdClient; ?></h3>
        </div>
        <table class="TableFiche">
            <tr class="TableFiche">
                <th class="TableFiche">Nom</th>
                <th class="TableFiche">Raison Sociale</th>
                <th class="TableFiche">Sum SIREN</th>
                <th class="TableFiche">code APE</th>
                <th class="TableFiche">Adresse</th>
                <th class="TableFiche">Telephone</th>
                <th class="TableFiche">Num télécopie</th>
                <th class="TableFiche">email</th>
                <th class="TableFiche">numero agence</th>
                <th class="TableFiche">nombre km agence</th>
            </tr>
            <?php foreach ($client as $cl) {
                echo '<tr class="Statable"><td class="Statable">' . $cl['client_num'] . 
                '</td><td class="Statable">' . $cl['client_raison_sociale'] . 
                '</td><td class="Statable">' . $cl['client_num_SIREN'] . 
                '</td><td class="Statable">' . $cl['client_code_APE'] . 
                '</td><td class="Statable">' . $cl['client_adresse'] .
                '</td><td class="Statable">' . $cl['client_num_télécopie'] .
                '</td><td class="Statable">' . $cl['client_téléphone'] .
                '</td><td class="Statable">' . $cl['client_email'] .
                '</td><td class="Statable">' . $cl['agence_num'] .
                '</td><td class="Statable">' . $cl['nbkm_agence_client'] .
                '</td></tr>';
            } ?>
        </table>