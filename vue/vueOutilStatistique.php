  
    <h1>Outil Statistique</h1>

    <!-- sellectionner un mois -->
    <form action="./?action=outilStat" method="post" class="outilstat-form">
            <p>
                <label for="month">mois</label>
                <input type="month" name="month" id="month">
            </p>
            <p>
                <input type="submit" value="Valider">
            </p>
    </form>
    
    <p>Tabler</p>

    <!-- Affiche les statistique du mois ( nb_intervention_valider / nb_km_parcourue / durée_passée_sur_matériel) -->
