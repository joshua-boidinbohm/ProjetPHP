<?php
$get = 'get' . ucwords($_GET['ref']);
?>
<form class="transparent" action="?action=updatedProduit&ref=<?php echo $_GET['ref']?>&mod=<?php echo $_GET['mod']?>" method="post">
    <fieldset>
        <legend>Modification des informations :</legend>
        <br>
        <p>
            <?php
            if ($_GET['ref'] == 'description'){
                echo '<label for="value">'.ucwords($_GET['ref']).'</label> :
                <textarea name="value" id="value"></textarea> :';
            }
            else{
                echo'<label for="value">'.ucwords($_GET['ref']).'</label> :
                <input type="text" name="value" value="'.htmlspecialchars($v->$get()).'" id="value" required/>';
            }
            ?>
        </p>
        <p>
            <input type="submit" value="Mettre à jour" />
        </p>
    </fieldset>
</form>