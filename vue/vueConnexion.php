<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $titre ?></title>
        <link rel="stylesheet" href="./css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="./images/CashCash.png" />
    </head>
    <body>
        <img class="logo" src="./images/CashCash.png" alt="logo">
        <h1>Connexion</h1>
        <!--<img class="line1" src="../images/Line 4.png" alt="ligne"> -->
        <img class="line2" src="./images/Line 3.png" alt="ligne"> <br>
        <form action="./?action=connexion" method="post" class="connexion-form">
            <p>
                <label for="username">username</label>
                <input type="text" name="username" id="username">
            </p>
            <p>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
            </p>
            <p>
                <input type="submit" value="Se connecter">
            </p>
        </form>