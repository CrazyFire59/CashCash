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
    h1{
        text-align: center;
        font-size: 100%;
        font-weight: bold;
        color: black;
        margin-top: 30px;
        margin-bottom: 30px;
        background-color: #f2f2f2;
    }
    .Outils {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        width: 70%;
        height: 40%;
        margin-right : 15%;
        margin-left: 15%;
        margin-top: 30px;
        margin-bottom: 30px;
        background-color: #f2f2f2;
        border-radius: 10px;
        padding: 10px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        color: black;
        transition: all 0.3s ease-in-out;
    }
    button{
        background-color: #f2f2f2;
        border: none;
        border-radius: 10%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 10px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        color: black;
        transition: all 0.3s ease-in-out;
        width: 100%;
        height: 60%;
        margin-left: 2%;
        margin-right: 2%;

    }
    a{
        text-decoration: none;
        color: black;
        font-weight: bold;
        font-size: 100%;
        text-align: center;
        margin-left: 10%;
        margin-right: 10%;
    }
    .line2 {
        display: inline-block;
        vertical-align: top;
        margin-right:  20%;
        text-align: left;
        width: 50%;
        margin-top: 1%;
        margin-left: 20%;
        margin-right: 20%;
    }
</style>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil</title>
    </head>
    <body>
        <h1>Bonjour Assistants Jacque Morise</h1>
        <img class="line2" src="../images/Line 3.png" alt="ligne"> <br>

        <!-- 3 gros bouton avant de revenire a la ligne qui renvoie vers les outils -->
        <div class="Outils">
            <button><a href="#">Gestion Interventions</a></button>
            <button><a href="#">Affectation Visite</a></button>
            <button><a href="#">Outil Statistiques</a></button>
            <button><a href="#">Fichier Client</a></button>
        </div>

    </body>
</html>