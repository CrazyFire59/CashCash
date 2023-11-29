<style type="text/css">
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        body {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
        }
        header{
            background: #9F9F9F;
            height: 80px;
            line-height: 80px;
            color: RED;
            text-align: center;
            letter-spacing: 5px;
            font-weight: bold;
        }
        .logo{
            float: left;
            margin-left: 10px;
        }
        .logo img{
            height: 100%;
        }
        .menu-navigation{
            width: 100%;
            height: 80px;
            background: #9F9F9F;
            line-height: 80px;
            color: white;
            text-align: right;
            letter-spacing: 5px;
            font-weight: bold;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }
        .liens{
            float: right;
            margin-right: 10px;
        }
        .liens ul{
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .liens ul li{
            display: inline-block;
            line-height: 80px;
            margin: 0 5px;
        }
        .liens ul li a{
            color: white;
            text-decoration: none;
            font-size: 70%;
            padding: 7px 13px;
            border-radius: 3px;
        }
        .liens ul li a.active,
        .liens ul li a:hover{
            background: #4F4F4F;
            transition: .5s;
        }

    </style>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Entete</title>
    </head>
    
    <body><!--un menu navigation avec un logo à gauche et un menu à droite avec des liens dont Deconnexion et Mon Profile end-->
        <header>
            <div class="menu-navigation">
                <div class="logo">
                    <img src="../images/CashCash.png" alt="logo">
                </div>
                <div class="liens">
                    <ul>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Deconnexion</a></li>
                    </ul>
                </div>
            </div>
        </header>
    </body>