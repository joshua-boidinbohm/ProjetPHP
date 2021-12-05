<?php
    require_once File::build_path(array("model","ModelProduit.php"));
    $tab_prod = ModelProduit::getAllProduits();
    for ($i = 0; $i<count($tab_prod); $i++){
        $tab_noms[$i]=$tab_prod[$i]->getModele();
    }
    $i = 0;
    foreach ($_SESSION as $key=>$value) {
        if (in_array($value[0], $tab_noms)) {
            echo "<p>Vous avez " . $value[1] . " " . $value[0] . " dans votre panier de bg. </p><br>";
            $tab_total[$i] = $value[1]*$tab_prod[$i]->getPrix();
            $i++;
        }
    }
    $total = $tab_total[0]+$tab_total[1]+$tab_total[2];
    echo '<p> Total ='.$total.' €</p>';

    if ($i == 0){
        echo "<p> Votre panier est vide.</p>";
    }

?>