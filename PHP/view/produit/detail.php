<?php
    echo '<p> Panneau solaire ' . htmlspecialchars($v->getModele()) . ' de nom ' . htmlspecialchars($v->getNom()) . ' (puissance ' . htmlspecialchars($v->getPuissance()) . ') ';
    echo '<form action="Cookie.php" method="get">
                <div>
                    <br>
                    quantité : <select name="quantite">
                        <option value = "1" selected>1</option>
                        <option value = "2">2</option>
                        <option value = "3">3</option>
                    </select>
                </div>
                <div>
                <br>
                    <input type="hidden" name="libelle" value="' . htmlspecialchars($v->getModele()) .'">
                    <input type="submit" value="Ajouter au panier">               
                </div>
          </form>'
    ;
?>
