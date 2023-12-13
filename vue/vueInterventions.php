<?php 
include_once "../controleur/ctrInterventions.php"; 
?>

<h1>Interventions</h1>

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
                    <th>#</th>
                    <th>Date</th>
                    <th>Heure</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($interventions as $intervention): ?>
                    <tr>
                        <td><?= $intervention["intervention_id"] ?></td>
                        <td><?= $intervention["intervention_date"] ?></td>
                        <td><?= $intervention["intervention_heure"] ?></td>
                        <td><a href="">Voir</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </body>



