<?php
    foreach ($tab_v as $v) {
        $modPrenom = htmlspecialchars($v->getPrenom());
        $modNom = htmlspecialchars($v->getNom());
        $modMail = rawurlencode($v->getEmail());
        $modurl = rawurlencode($v->getID());

        echo '<p > 
                Utilisateur : ' . $modPrenom . ' ' . $modNom . ' <br> 
                <a href="?action=readUserAdmin&email=' . $modMail . '">(+ d\'info) </a> <a href="?action=deleteUser&id='.$modurl.'">(- supprimer)</a>
          </p>';
    }
?>
