<?php
    echo '<p> Panneau solaire ' . htmlspecialchars($v->getModele()) . ' de nom ' . htmlspecialchars($v->getNom()) . ' (puissance ' . htmlspecialchars($v->getPuissance()) . ') ';
    echo '<form method="get">
                <div>
                    <input type="hidden" name="action" value="addPanier">
                    <input type="hidden" name="mod" value="'.$v->getModele().'">
                    <br>
                    quantité : <select name="quantite">
                        <option value = "1" selected>1</option>
                        <option value = "2">2</option>
                        <option value = "3">3</option>
                    </select>
                </div>
                <div>
                <br>
                    <input type="submit" value="Ajouter au panier">               
                </div>
          </form>'
    ;
?>
