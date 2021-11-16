<?php
    echo '<p> Panneau solaire ' . htmlspecialchars($v->getModele()) . ' de nom ' . htmlspecialchars($v->getNom()) . ' (puissance ' . htmlspecialchars($v->getPuissance()) . ') ';
    echo '<form action="fichier.php">
                
                <div>
                    <br>
                    quantité : <select name = "quantité">
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
