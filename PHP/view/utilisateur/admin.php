<h1>
    <p>Onglet Administration</p>
</h1>
<h2>
    Liste des produits :
</h2>
<?php
$tab_p = ModelProduit::getAllProduits();
foreach ($tab_p as $v) {
    $modhtml = htmlspecialchars($v->getModele());
    $modurl = rawurlencode($v->getModele());
    echo '<p id="article"> 
                    ' . $modhtml . ' <a href="?action=readAdmin&mod='.$modurl.'">(+ d\'infos)</a> <a href="?action=delete&mod=' . $modurl . '">(- supprimer)</a>
              </p>';
}
?>
<p><a href="?action=create">Ajouter un produit</a></p>
<h2>Liste des utilisateurs :</h2>
<?php $tab_v = ModelUser::getAllUsers(); require 'list.php';?>
<h2>
    Liste des commandes :
</h2>
<?php
$tab_z = ModelCommande::getAllCommandes();
foreach ($tab_z as $v) {
    $modhtml = htmlspecialchars($v->getIDCommande());
    $modurl = rawurlencode($v->getIDCommande());
    echo '<p id="article"> 
                    ' . $modhtml . ' <a href="?action=readCom&id='.$modurl.'">(+ d\'infos)</a>
              </p>';
}
?>
