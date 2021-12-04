<?php
    foreach ($tab_v as $v) {
        $modPass = htmlspecialchars($v->getMdp());
        $modPrenom = htmlspecialchars($v->getPrenom());
        $modNom = htmlspecialchars($v->getNom());
        $modMail = htmlspecialchars($v->getEmail());
        $modurl = rawurlencode($v->getID());

        // echo 'Email :  ' . $modMail . ' <br> Mot de passe : ' . $modPass . ' <br>'


        echo '<p > 
                Utilisateur : ' . $modPrenom . ' ' . $modNom . ' <br> 
                <a href="?action=readUser&id=' . $modurl . '">(+ d\'info) </a> 
          </p>';



    }

?>
