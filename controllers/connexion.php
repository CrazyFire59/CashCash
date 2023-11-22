<html>
    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
    </head>
    <style>
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
        h1 {
            margin-top: 50px;
            color: #333;

        }

        form {
            margin-left: 30%;
            margin-right: 30%;
            text-align: left;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0D9DCB;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0D9DCB;
        }
        .logo {
            width: 15%;
            margin-bottom: 20px;
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 20px;
            
        }
        .line1 {
            display: inline-block;
            vertical-align: top;
            margin-right: 20px;
            text-align: left;
            width: 300px;
            margin-bottom: 20px;
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .line2 {
            display: inline-block;
            vertical-align: top;
            margin-right: 20px;
            text-align: left;
            width: 50%;
            margin-bottom: 20px;
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 20px;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            border-color: #0D9DCB;
        }
        input[type="submit"]:focus {
            outline: none;
        }
        input[type="submit"]:active {
            background-color: #0D9DCB;
            box-shadow: none;
            transform: translateY(2px);
        }
        input[type="submit"]:hover {
            background-color: #0D9DCB;
            box-shadow: none;
            transform: translateY(2px);
        }
    </style>
    <body>
        <img class="logo" src="../assets/img/CashCash.png" alt="logo">
        <h1>Connexion</h1>
        <!--<img class="line1" src="../assets/img/Line 4.png" alt="ligne"> -->
        <img class="line2" src="../assets/img/Line 3.png" alt="ligne"> <br>
        <form action="" method="post">
            <p>
                <label for="login">Login</label>
                <input type="text" name="login" id="login">
            </p>
            <p>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
            </p>
            <p>
                <input type="submit" value="Se connecter">
            </p>
        </form>
    </body>
</html>