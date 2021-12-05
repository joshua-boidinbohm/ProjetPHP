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
                    ' . $modhtml . ' <a href="?action=delete&mod=' . $modurl . '">(- supprimer)</a>
              </p>';
}
?>
<p><a href="?action=create">Ajouter un produit</a></p>
<p>
    à implémenter ! il faut que l'on puisse ajouter un produit dans la BD.
</p>
<h2>Liste des utilisateurs :</h2>
<?php $tab_v = ModelUser::getAllUsers(); require 'List.php';?>
