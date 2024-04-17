<div class="titre">
            <h3>Modifier Client</h3>
        </div>
        <form action ="./?action=validerClient" method="post">
        <table>
            <thead>
                <tr>
                    <th>client_num</th>
                    <th>raison sociale</th>
                    <th>SIREN</th>
                    <th>code APE</th>
                    <th>num télécopie</th>
                    <th>adresse</th>
                    <th>code postal</th>
                    <th>Nom</th>
                    <th>adresse</th>
                    <th>telephone</th>
                    <th>email</th>
                    <th>num agence</th>
                    <th>nb km</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $client["client_num"] ?></td>
                    <td><input type="text" name="raisonSociale" value="<?= $client[" raison_sociale"] ?>" class="text"></td>
                    <td>
                        
                    </td>
                </tr>
            </tbody>
        </table>
            
            <p>
                <input type="submit" value="Valider" class="submit">
            </p>
        </form>
