
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion Assistant</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="titre">
            <h3>Fichier Client</h3>
        </div>
        <div id="conteneur">
                <form action="../controleur/" method="POST" class="recherche">
                    <div class="sous-conteneur">
                        <div>
                            <label for="numero">
                            <input type="text" name="numero" id="numero" placeholder="Recherche...">
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
            foreach ($clients as $unClient) {
                //afficher une table ou afficher les informations du client (Numéro, bouton Editer, bouton Modifier)
                echo '<tr class="Statable"><td class"Statable">' . $unClient['client_num'] . '</td><td class="Statable">' . '<input type="submit" value="Visualiser" class="boutonstat"></td><td class="Statable">' . '<input type="submit" value="Modifier" class="boutonstat"></td></tr>';

            }

            
            ?>
        </table>
    </body>
