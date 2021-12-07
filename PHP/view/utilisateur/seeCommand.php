<?php
$tab_z = ModelCommande::getAllCommandByUser($u);
//$tab_z = ModelCommande::getAllCommandes();
foreach ($tab_z as $v) {
    $modhtml = htmlspecialchars($v->getIDCommande());
    $modurl = rawurlencode($v->getIDCommande());
    echo '<p id="article"> 
                    ' . $modhtml . ' <a href="?action=readCom&id='.$modurl.'">(+ d\'infos)</a>
              </p>';
}
?>