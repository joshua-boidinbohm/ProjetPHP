<?php
$get = 'get' . ucwords($_GET['ref']);
?>
<form class="transparent" action="?action=updated&ref=<?php echo $_GET['ref']?>" method="post">
    <fieldset>
        <legend>Modification des informations :</legend>
        <br>
        <p>
            <?php echo '<label for="value">'.ucwords($_GET['ref']).'</label>' ?>:
            <?php echo '<input type="text" name="value" id="value" value="' . htmlspecialchars($v->$get()) . '" required/>'?>
        <p>
        <p>
            <input type="submit" value="Mettre à jour" />
        </p>
    </fieldset>
</form>
