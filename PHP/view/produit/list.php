<?php
foreach ($tab_v as $v){
    $modhtml = htmlspecialchars($v->getModele());
    $modurl = rawurlencode($v->getModele());




    echo '<p id="article"> 
                <img src="src/images/'. $modhtml .'.jpeg"> '.' <br>
                Produit de modèle '. $modhtml . ' <a href="?action=read&mod=' . $modurl . '">(+ d\'info)</a>
          </p>';


}
?>
