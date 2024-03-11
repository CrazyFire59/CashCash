<?php 
//include_once "../controleur/ctrIntervention.php"; 
// pq tu include le controleur ? c'est l'inverse normalement
?>
 
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

        <h2>Informations sur le client</h2>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Raison sociale</th>
                    <th>SIREN</th>
                    <th>APE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $intervention["client_num"] ?></td>
                    <td><?= $intervention["client_raison_sociale"] ?></td>
                    <td><?= $intervention["client_num_SIREN"] ?></td>
                    <td><?= $intervention["client_code_APE"] ?></td>
                </tr>
            </tbody>
        </table>

        <h2>Informations sur le technicien</h2>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $intervention["employe_num_matricule"] ?></td>
                    <td><?= $intervention["employe_nom"] ?></td>
                    <td><?= $intervention["employe_prenom"] ?></td>
                </tr>
            </tbody>
        </table>

    </body>



