<?php
    echo '<h2><p>Informations du compte</p></h2><br>';
    echo '<p> ID : ' . $v->getID();
    echo '<p> Nom : ' . $v->getNom();
    echo '<p> Prénom : ' . $v->getPrenom();
    echo '<p> Email : ' . $v->getEmail();
    echo '<p> Adresse : ' . $v->getAdresse();
    echo '<p> Ville : ' . $v->getVille();
    echo '<p> Code postal : ' . $v->getCP();
    echo '<p> Pays : ' . $v->getPays();
    ?>
