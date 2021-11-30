<form method="post">
    <fieldset>
        <legend>Connectez-vous :</legend>
        <p>
            <label for="email">Email</label> :
            <input type="email" name="email" class="email" required/>
        </p>
        <p>
            <label for="mdp">Mot de passe</label> :
            <input type="password" name="mdp" class="mdp" required/>
        </p>
        <input type='hidden' name='action' value='connected'>
        <p>
            <input type="submit" value="Se connecter" />
        </p>
    </fieldset>
</form>
