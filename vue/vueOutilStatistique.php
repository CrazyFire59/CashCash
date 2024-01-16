  
    <h1 class="outilstat">Outil Statistique</h1>

    <!-- sellectionner un mois -->
    <form action="./?action=outilStat" method="post" class="outilstat-form">
            <p>
                <label for="month"> Choisir le Mois</label>
                 <input type="month" name="month" id="month" value="<?php echo $moisetannee; ?>"  class="inputstat">
                 <!-- ou <?= $moisetannee ?> -->
            </p>
            <p>
                <input type="submit" value="Valider" class="boutonstat">
            </p>
    </form>
    
    <h1>Tabler</h1>

    <table class="Statable">
    <tr class="Statable">
        <th class="Statable">matricule Technicien</th>
        <th class="Statable">nb intervention</th>
        <th class="Statable">nb km parcourue</th>
        <th class="Statable">durée passée sur matériel</th>
    </tr>
    <?php
    // affiche le tableau des statistiques
    foreach ($stat as $value) {
        echo '<tr class="Statable"><td class="Statable">' . $value['employe_num_matricule'] . '</td><td class="Statable">' . $value['nb_intervention'] . '</td><td class="Statable">' . $value['nb_km_parcourue'] . '</td><td class="Statable">' . $value['durée_passée_sur_matériel'] . '</td></tr>';
    }
    ?>
    </table>
    <!-- Affiche les statistique du mois ( nb_intervention_valider / nb_km_parcourue / durée_passée_sur_matériel) -->
