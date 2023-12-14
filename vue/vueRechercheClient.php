<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion Assistant</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div id="titre">
            <h3>Fichier Client</h3>
        </div>
        <div id="conteneur">
                <form action="../controleur/controleurGestionIntervention.php" method="POST" class="recherche">
                    <div class="sous-conteneur">
                        <div>
                            <label for="techniciens">Recherche par Clients</label>
                            <select name="techniciens" id="techniciens">
                                <?php
                                foreach ($techniciens as $technicien) {
                                    
                                }   
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="date">Recherche par date</label>
                            <input type="date" name="date" id="date">
                        </div>
                    </div>
                </form> 
        </div>
    </body>
</html>