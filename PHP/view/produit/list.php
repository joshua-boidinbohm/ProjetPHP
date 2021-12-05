<?php
foreach ($tab_v as $v){
    $modhtml = htmlspecialchars($v->getImage());
    $modhtml1 = htmlspecialchars($v->getModele());
    $modurl = rawurlencode($v->getModele());

    echo '<p id="article"> 
                <img src='. $modhtml .' style="width=600px, height=358px"> '.' <br>
                Produit de modèle '. $modhtml1 . ' <a href="?action=read&mod=' . $modurl . '">(+ d\'info)</a>
          </p>';
}
?>
