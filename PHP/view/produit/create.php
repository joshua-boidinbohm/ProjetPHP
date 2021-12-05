<form class="transparent" action="?action=created" method="post">
    <fieldset>
        <legend><h3>Renseignez les données :</h3></legend>
        <br>
        <p>
            <label for="mod">Référence du modèle</label> :
            <input type="text" name="mod" id="mod" required/>
        </p>
        <p>
            <label for="nom">Nom du modèle</label> :
            <input type="text" name="nom" id="nom" required/>
        </p>
        <p>
            <label for="puissance">Puissance du modèle</label> :
            <input type="text" name="puissance" class="puissance" required/>
        </p>
        <p>
            <label for="prix">Prix du modèle</label> :
            <input type="text" name="prix" id="prix" required/>
        </p>
        <p>
            <label for="description">Description du modèle</label> :
            <textarea name="description" class="description" required></textarea>
        </p>
        <p>
            <label for="image">URL de l'illustration du modèle</label> :
            <input type="text" name="image" id="image" required/>
        </p>
        <p>
            <input type="submit" value="Ajouter" />
        </p>
    </fieldset>
</form>
