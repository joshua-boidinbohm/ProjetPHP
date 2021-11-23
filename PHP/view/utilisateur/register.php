<form method="post">
<fieldset>
    <legend>Voiture :</legend>
        <p>
            <label for="marque">Marque</label> :
            <input type="text" placeholder="Peugeot" name="marque" id="marque" required/>

        <p>
            <label for="couleur">Couleur</label> :
            <input type="text" placeholder="bleu" name="couleur" id="couleur" required/>
        </p>
        <p>
            <label for="immat_id">Immatriculation</label> :
            <input type="text" placeholder="256AB34" name="immatriculation" id="immat_id" required/>
        </p>
        <input type='hidden' name='action' value='registered'>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
</fieldset>
</form>

