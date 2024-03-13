<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="icon" type="image/png" href="./images/CashCash.png" />
        <title><?php echo $titre ?></title>
    </head>
    
    <body><!--un menu navigation avec un logo à gauche et un menu à droite avec des liens dont Deconnexion et Mon Profile end-->
        <header>
            <div class="menu-navigation">
                <div class="logonav">
                    <img src="./images/CashCash.png" alt="logonav">
                </div>
                <div class="liens">
                    <ul>
                        <li><a href="./?action=profil">Profile</a></li>
                        <li><a href="./?action=deconnexion">Deconnexion</a></li>
                    </ul>
                </div>
            </div>
        </header>