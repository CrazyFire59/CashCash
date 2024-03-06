<div id="container">
    <h1>Modifier votre mot de passe</h1>
    
    <form action="./?action=modifiermotdepasse" method="post" class="form-inscription">
        <label for="ancienMotDePasse">Ancien mot de passe :</label>
        <input type="password" id="ancienMotDePasse" name="ancienMotDePasse" required>
        <br>
        <label for="nouveauMotDePasse">Nouveau mot de passe :</label>
        <input type="password" id="nouveauMotDePasse" name="nouveauMotDePasse" required>
        <br>
        <label for="nouveauMotDePasse2">Nouveau mot de passe :</label>
        <input type="password" id="nouveauMotDePasse2" name="nouveauMotDePasse2" required>
        <br>
        <button class="submit" type="submit" name="submit">Modifier</button>
    </form>
</div>
<br>