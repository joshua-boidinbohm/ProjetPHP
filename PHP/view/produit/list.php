<?php
foreach ($tab_v as $v){
    $modhtml = htmlspecialchars($v->getModele());
    $modurl = rawurlencode($v->getModele());

    echo '<link href="src/CSS/design.css" rel="stylesheet">';
    echo '<div> <img src="src/images/panneau1.jpeg">
           </div>';


    echo '<p id="article"> Produit de modèle '. $modhtml . ' <a href="?action=read&mod=' . $modurl . '">(+ d\'info)</a></p>';


}
?>
