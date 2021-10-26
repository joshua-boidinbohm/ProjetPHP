<?php
foreach ($tab_v as $v){
    $modhtml = htmlspecialchars($v->getModele());
    $modurl = rawurlencode($v->getModele());

    echo '<img '
    echo '<p> Produit de modèle '. $modhtml . ' <a href="?action=read&mod=' . $modurl . '">(+ d\'info)</a></p>';

}
?>
