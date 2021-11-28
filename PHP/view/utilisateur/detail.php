<?php
    echo '<p> Utilisateur ' . htmlspecialchars($v->getNom()) . ' ' . htmlspecialchars($v->getPrenom()) . ' d\'ID ' . htmlspecialchars($v->getID()) . '. Son email est ' . htmlspecialchars($v->getEmail()) . '.</p>';
?>