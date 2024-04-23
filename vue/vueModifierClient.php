<div class="titre">
            <h3>Modifier Client</h3>
        </div>
        <!-- Formulaire de modification du client /?action=validerClient-->
        <form action ="" method="POST">
        <table>
            <thead>
                <tr>
                    <th>client_num</th>
                    <th>raison sociale</th>
                    <th>SIREN</th>
                    <th>code APE</th>
                    <th>adresse</th>
                    <th>num télécopie</th>
                    <th>telephone</th>
                    <th>email</th>
                    <th>num agence</th>
                    <th>nb km</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $IdClient ?></td>
                    <td><?= $raison_sociale ?></td>
                    <td><?= $SIREN ?></td>
                    <td><?= $codeAPE ?></td>
                    <td><input type="text" name="adresse" value="<?= $adresse ?>" class="text"></td>
                    <td><input type="text" name="numTelephonecopie" value="<?= $telecopie ?>" class="text"></td>
                    <td><input type="text" name="numTelephone" value="<?= $telephone ?>" class="text"></td>
                    <td><input type="text" name="Email" value="<?= $email ?>" class="text"></td>
                    <td> <?php echo $agence ?> <select name="numagence" id="numagences">
                    <?php foreach ($agenceListe as $agence): ?>
                            <option value="<?= $agence["agence_num"] ?>">
                            <?php echo $agence["agence_num"] ?>
                        </option>
                    <?php endforeach ?></select></td>
                    <td><input type="text" name="nbkm" value="<?= $nbkm ?>"></td>


                        
                    </td>
                </tr>
            </tbody>
        </table>
            
            <p>
                <input type="submit" value="modifier" name="modifier" class="submit" id="submit"s>
            </p>
        </form>
