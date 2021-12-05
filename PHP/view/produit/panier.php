<?php
    require_once File::build_path(array("model","ModelProduit.php"));
    $tab_prod = ModelProduit::getAllProduits();
    for ($i = 0; $i<count($tab_prod); $i++){
        $tab_noms[$i]=$tab_prod[$i]->getModele();
    }
    $total = 0;
    $i = 0;
    foreach ($_SESSION as $key=>$value) {
        if (in_array($value[0], $tab_noms)) {
            echo "<p>Vous avez " . $value[1] . " " . $value[0] . " dans votre panier de bg. </p><br>";
            $total = $total + $value[1]*ModelProduit::getProduitByModele($value[0])->getPrix();
            $i++;
            $tab_commande[$i][0] = $value[0];
            $tab_commande[$i][1] = $value[1];
        }
    }
    echo '<p> Total = '.$total.'€</p>';



    if ($i == 0){
        echo "<p> Votre panier est vide.</p>";
    } else {
        echo '<p><a href="?action=clearPanier">Vider le panier</a></p><br>';
        echo '<p><a href="?action=command">Commander maintenant</a></p>';
    }

?>