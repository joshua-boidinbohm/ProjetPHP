<h1>
    Onglet Administration
</h1>
<h2>
    Liste des produits :
</h2>
<?php
$tab_v = ModelProduit::getAllProduits();
foreach ($tab_v as $v) {
    $modhtml = htmlspecialchars($v->getModele());
    $modurl = rawurlencode($v->getModele());
    echo '<p id="article"> 
                    Produit de modèle ' . $modhtml . ' <a href="?action=delete&mod=' . $modurl . '">(- supprimer)</a>
              </p>';
}
?>
<h2>
    Ajouter un produit :
</h2>
<p>
    à implémenter ! il faut que l'on puisse ajouter une voiture en BD.
</p>
