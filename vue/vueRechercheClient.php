
        <div class="titre">
            <h3>Fichier Client</h3>
        </div>
        <div id="conteneur">
                <form action="" method="POST" class="recherche">
                    <div class="sous-conteneur">
                        <div>
                            <label for="numero">
                            <input type="text" name="recherche" id="recherche" placeholder="Recherche...">
                            <input type="submit" class="submit" value="Valider"></input>
                            </label>
                        </div>
                    </div>
                </form> 
        </div>
        <table class="Statable">
            <tr class="Statable">
                <th class="Statable">Numéro Client</th>
                <th class="Statable">Visualiser</th>
                <th class="Statable">Modifier</th>
            </tr>
            <?php
            // affiche le numero des clients
            foreach ($clients as $unClient) { ?>
                <?php //afficher une table ou afficher les informations du client (Numéro, bouton Editer, bouton Modifier)
                 echo '<tr class="Statable"><td class"Statable">' . $unClient['client_num'] . '</td>'; ?>
                <td class="Statable"><a class="submit" href="./?action=visualiserclient&clientnum=<?=$unClient["client_num"]?>">Visualiser</a></td>
                <td class="Statable"><button type="submit" value="Modifier" class="submit">Modifier</button></td></tr>
                
            <?php }

            
            ?>
        </table>
