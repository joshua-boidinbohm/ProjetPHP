<?php
$mod = $v->getIDCommande();
$tab_u = unserialize($v->getContenu());
echo '<h2><p>Données du produit</p></h2><br>';
echo '<p> ID de la commande : ' . $mod;
echo '<p> ID du client : ' . $v->getIdClient();
echo '<p> Contenu de la commande : <br>';
foreach ($tab_u as $key=>$value) {
    echo "<p>".$value[1] . " " . $value[0] . "</p><br>";
}
echo '<p> Montant de la commande : ' . $v->getMontant() . '€';
echo '<p> Date de la commande : ' . $v->getDate();
echo '<a href="?action=deleteCom&id=' . $mod . '">(- supprimer)</a>';
?>
