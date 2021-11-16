<?php
    if (isset($_SESSION['listeAchats'])) {
        var_dump($_SESSION['listeAchats']);
    }

    else{
        echo "votre panier est vide";
    }

?>