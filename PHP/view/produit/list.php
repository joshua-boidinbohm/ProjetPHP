<?php
foreach ($tab_v as $v){
    $modhtml = htmlspecialchars($v->getModele());
    $modurl = rawurlencode($v->getModele());

    echo '<img src="src/images/panneau1.jpeg">';
    echo '<p> Produit de modèle '. $modhtml . ' <a href="?action=read&mod=' . $modurl . '">(+ d\'info)</a></p>';
    echo '<br> <br> <br>';

}
?>
