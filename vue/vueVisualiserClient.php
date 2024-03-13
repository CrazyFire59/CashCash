<div class="titre">
            <h3>Fiche de numero <?php echo $IdClient; ?></h3>
        </div>
        <table class="Statable">
            <tr class="Statable">
                <th class="Statable">Nom</th>
                <th class="Statable">Raison Sociale</th>
                <th class="Statable">Sum SIREN</th>
                <th class="Statable">code APE</th>
                <th class="Statable">Adresse</th>
                <th class="Statable">Telephone</th>
                <th class="Statable">Num télécopie</th>
                <th class="Statable">email</th>
                <th class="Statable">numero agence</th>
                <th class="Statable">nombre km agence</th>
            </tr>
            <? foreach ($client as $cl) {
                echo '<tr class="Statable"><td class="Statable">' . $cl['client_num'] . 
                '</td><td class="Statable">' . $cl['client_raison_sociale'] . 
                '</td><td class="Statable">' . $cl['client_num_SIREN'] . 
                '</td><td class="Statable">' . $cl['client_code_ape'] . 
                '</td><td class="Statable">' . $cl['client_adresse'] . 
                '</td><td class="Statable">' . $cl['client_telephone'] . 
                '</td></tr>';
            } ?>
        </table>