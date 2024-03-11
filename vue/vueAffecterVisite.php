
        <div class="titre">
            <h3>Affecter Visite</h3>
        </div>
        <form action ="./?action=affecterVisite" method="post">
            <p>créer un nouveau visite
                <label for="date">Date</label>
                <input type="date" name="intervention_date" id="intervention_date" value="<?php echo date('Y-m-d'); ?>">
        
                <label for="heure">Heure</label>
                <input type="time" name="intervention_heure" id="intervention_heure" value="<?php echo date('H:i:s'); ?>">

                <label for="client">Client</label>
                <input type="number" name="client_num" id="client_num" value="">

                <label for="technicien">Technicien</label>
                <input type="number" name="employe_num_matricule" id="technicien" value="">
                <!--<select name="numTechnicien" id="techniciens">
                <?php foreach ($techniciensDansMemeAgenceQueClient as $technicien): ?>
                                <option value="<?= $technicien["employe_num_matricule"]?> <?= $intervention["employe_num_matricule"] == $technicien["employe_num_matricule"] ? "selected" : "" ?>">
                                    <?= $technicien["employe_prenom"]?> <?= $technicien["employe_nom"]?>
                                </option>
                            <?php endforeach;?>
                </select>-->
            </p>
            
            <p>
                <input type="submit" value="Valider" class="submit">
            </p>
        </form>
