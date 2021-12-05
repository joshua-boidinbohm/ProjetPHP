<form class="transparent" action="?action=updatedMdp" method="post">
    <fieldset>
        <legend>Modification du mot de passe :</legend>
        <br>
        <p>
            <label for="newpasswd">Nouveau mot de passe</label> :
            <input type="password" name="newpasswd" id="newpasswd" required/>
        <p>
            <label for="newpasswd2">Vérification du nouveau mot de passe</label> :
            <input type="password" name="newpasswd2" id="newpasswd2" required/>
        </p>
        <p>
            <label for="oldpasswd">Ancien mot de passe</label> :
            <input type="password" name="oldpasswd" id="oldpasswd" required/>
        </p>
        <input type='hidden' name='action' value='updated'>
        <p>
            <input type="submit" value="Mettre à jour" />
        </p>
    </fieldset>
</form>