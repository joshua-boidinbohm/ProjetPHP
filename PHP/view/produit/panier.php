<?php
    require_once File::build_path(array("model","ModelProduit.php"));
    $tab_prod = ModelProduit::getAllProduits();
    for ($i = 0; $i<count($tab_prod); $i++){
        $tab_noms[$i]=$tab_prod[$i]->getModele();
    }
    foreach ($_SESSION as $key=>$value) {
        if (in_array($value[0], $tab_noms)) {
            echo "Vous avez " . $value[1] . " " . $value[0] . " dans votre panier de bg. <br>";
        }
    }

?>