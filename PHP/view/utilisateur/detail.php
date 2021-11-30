<?php
    echo '<p> Utilisateur ' . $v->getNom(). ' ' . $v->getPrenom() . ' d\'ID ' . $v->getID() . '. Son email est ' . $v->getEmail() . '.</p><br>';
    echo '<p><a href="?action=disconnect">(se déconnecter)</a></p>';
?>