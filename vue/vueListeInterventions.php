<?php 
include_once "../controleur/ctrListeInterventions.php"; 
?>

<h1>Gestion des Interventions</h1>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <title>Interventions</title>

        <style>
            table, td, th {
                border: 1px solid black;
            }

            table{
                border-collapse: collapse;
            }

            td{
                padding: 10px;
            }
        </style>
    </head>
    
    <body>

        <table>
            <thead>
                <tr>
                    <th>Numéro Intervention</th>
                    <th>Date Intervention</th>
                    <th>Heure Intervention</th>
                    <th>Technicien</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($interventions as $intervention): ?>
                    <tr>
                        <td><?= $intervention["intervention_id"] ?></td>
                        <td><?= $intervention["intervention_date"] ?></td>
                        <td><?= $intervention["intervention_heure"] ?></td>
                        <td><?= $intervention["employe_prenom"] ?> <?= $intervention["employe_nom"] ?></td>
                        <td><a href="vueIntervention.php?id=<?=$intervention["intervention_id"]?>">Modifier</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </body>



