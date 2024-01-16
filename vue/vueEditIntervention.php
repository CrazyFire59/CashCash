<?php 
//include_once "../controleur/ctrIntervention.php"; 
// pq tu include le controleur ? c'est l'inverse normalement
?>
 
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <title>Modification de l'interventions N 1</title>

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

            th{
                padding: 5px;
            }
        </style>
    </head>
    
    <body>
        <h1>Intervention #<?= $intervention["intervention_id"] ?></h1>

        <h2>Informations sur l'intervention</h2>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Heure</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $intervention["intervention_id"] ?></td>
                    <td><?= $intervention["intervention_date"] ?></td>
                    <td><?= $intervention["intervention_heure"] ?></td>
                </tr>
            </tbody>
        </table>

    </body>



