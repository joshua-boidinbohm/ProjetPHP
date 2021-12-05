<?php
    foreach ($tab_v as $v) {
        $modPass = htmlspecialchars($v->getMdp());
        $modPrenom = htmlspecialchars($v->getPrenom());
        $modNom = htmlspecialchars($v->getNom());
        $modMail = htmlspecialchars($v->getEmail());
        $modurl = rawurlencode($v->getID());

        echo '<p > 
                Utilisateur : ' . $modPrenom . ' ' . $modNom . ' <br> 
                <a href="?action=readUserAdmin&email=' . $modMail . '">(+ d\'info) </a> <a href="?action=deleteUser&id='.$modurl.'">(- supprimer)</a>
          </p>';
    }
?>
