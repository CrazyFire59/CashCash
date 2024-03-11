<div id="container">
    <h1>Inscription</h1>
    <br>
    
    <form action="./?action=inscription" method="post" class="form-inscription">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="matricule">Num Matricule :</label>
        <input type="text" id="matricule" name="matricule" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="role">Role Utilisateur :</label>
        <select class="select-inscription" id="role" name="role" required>
            <option class="option-inscription" value="1">Assistant</option>
            <option class="option-inscription" value="2">Agent</option>
            <option class="option-inscription" value="3">Technicien</option>
        </select>
        <br>
        <button class="submit" type="submit" name="submit">S'inscrire</button>
    </form>
</div>