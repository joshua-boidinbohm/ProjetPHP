<?php
    $id = $v->getID();
    echo '<h2><p>Informations du compte</p></h2><br>';
    echo '<p> ID : ' . $v->getID();
    echo '<p> Nom : ' . $v->getNom(). ' (<a href="?action=updateAdmin&ref=nom&id='.$id.'">modifier</a>)</p>';
    echo '<p> Prénom : ' . $v->getPrenom(). ' (<a href="?action=updateAdmin&ref=prenom&id='.$id.'">modifier</a>)</p>';
    echo '<p> Email : ' . $v->getEmail(). ' (<a href="?action=updateAdmin&ref=email&id='.$id.'">modifier</a>)</p>';
    echo '<p> Adresse : ' . $v->getAdresse(). ' (<a href="?action=updateAdmin&ref=adresse&id='.$id.'">modifier</a>)</p>';
    echo '<p> Ville : ' . $v->getVille(). ' (<a href="?action=updateAdmin&ref=ville&id='.$id.'">modifier</a>)</p>';
    echo '<p> Code postal : ' . $v->getCP(). ' (<a href="?action=updateAdmin&ref=cp&id='.$id.'">modifier</a>)</p>';
    echo '<p> Pays : ' . $v->getPays(). ' (<a href="?action=updateAdmin&ref=pays&id='.$id.'">modifier</a>)</p>';
    ?>
