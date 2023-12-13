<?php 
include_once "../controleur/ctrAgences.php"; 
?>

<h1>Agences</h1>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <title>Agences</title>

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
                    <th>Adresse</th>
                    <th>Nom</th>
                    <th>Telephone</th>
                    <th>Mail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agences as $agence): ?>
                    <tr>
                        <td><?= $agence["agence_num"] ?></td>
                        <td><?= $agence["agence_adresse"] ?></td>
                        <td><?= $agence["agence_nom"] ?></td>
                        <td><?= $agence["agence_telephone"] ?></td>
                        <td><?= $agence["agence_mail"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </body>

    <!-- http://localhost/CashCash/CashCash/vue/vueAgences.php -->



