<form class="transparent" method="post">
<fieldset>
    <legend>Renseignez vos informations :</legend>
        <p>
            <label for="nom">Votre nom</label> :
            <input type="text" placeholder="Dupont" name="nom" id="nom" required/>
        </p>
        <p>
            <label for="prenom">Votre prénom</label> :
            <input type="text" placeholder="Jean" name="prenom" id="prenom" required/>
        </p>
        <p>
            <label for="email">Votre email</label> :
            <input type="email" placeholder="mail@domaine.fr" name="email" class="email" required/>
        </p>
        <p>
            <label for="mdp">Votre mot de passe</label> :
            <input type="password" name="mdp" class="mdp" required/>
        </p>
        <p>
            <label for="mdp2">Vérification du nouveau mot de passe</label> :
            <input type="password" name="mdp2" id="mdp2" required/>
        </p>
        <p>
            <label for="adresse">Votre adresse</label> :
            <input type="text" placeholder="162 allée Blaise Pascal" name="adresse" id="adresse" required/>
        </p>
        <p>
            <label for="ville">Votre ville</label> :
            <input type="text" placeholder="Paris" name="ville" id="ville" required/>
        </p>
        <p>
            <label for="cp">Votre code postal</label> :
            <input type="text" placeholder="75000" name="cp" id="cp" required/>
        </p>
        <p>
            <label for="pays">Votre pays (nous ne livrons qu'en France pour le moment)</label> :
            <input type="text" value="France" name="pays" id="pays" disabled/>
        </p>
        <input type='hidden' name='action' value='registered'>
        <p>
            <input type="submit" value="S'inscrire" />
        </p>
</fieldset>
</form>

