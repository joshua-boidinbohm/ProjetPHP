<?php
$mod = htmlspecialchars($v->getModele());
echo '<h2><p>Données du produit</p></h2><br>';
echo '<p> Modèle : ' . $mod;
echo '<p> Nom : ' . htmlspecialchars($v->getNom()). ' (<a href="?action=updateProduit&ref=nom&mod='.$mod.'">modifier</a>)</p>';
echo '<p> Puissance : ' . htmlspecialchars($v->getPuissance()). ' (<a href="?action=updateProduit&ref=puissance&mod='.$mod.'">modifier</a>)</p>';
echo '<p> Prix : ' . htmlspecialchars($v->getPrix()). ' (<a href="?action=updateProduit&ref=prix&mod='.$mod.'">modifier</a>)</p>';
echo '<p> Description : <br>' . htmlspecialchars($v->getDesc()). ' (<a href="?action=updateProduit&ref=description&mod='.$mod.'">modifier</a>)</p>';
echo '<p> Image : ' . htmlspecialchars($v->getImage()). ' (<a href="?action=updateProduit&ref=image&mod='.$mod.'">modifier</a>)</p>';
?>
