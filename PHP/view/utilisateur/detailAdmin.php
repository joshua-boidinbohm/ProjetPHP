<?php
    $id = $v->getID();
    echo '<h2><p>Informations du compte</p></h2><br>';
    echo '<p> ID : ' . htmlspecialchars($v->getID());
    echo '<p> Nom : ' . htmlspecialchars($v->getNom()). ' (<a href="?action=updateAdmin&ref=nom&id='.$id.'">modifier</a>)</p>';
    echo '<p> Prénom : ' . htmlspecialchars($v->getPrenom()). ' (<a href="?action=updateAdmin&ref=prenom&id='.$id.'">modifier</a>)</p>';
    echo '<p> Email : ' . htmlspecialchars($v->getEmail()). ' (<a href="?action=updateAdmin&ref=email&id='.$id.'">modifier</a>)</p>';
    echo '<p> Adresse : ' . htmlspecialchars($v->getAdresse()). ' (<a href="?action=updateAdmin&ref=adresse&id='.$id.'">modifier</a>)</p>';
    echo '<p> Ville : ' . htmlspecialchars($v->getVille()). ' (<a href="?action=updateAdmin&ref=ville&id='.$id.'">modifier</a>)</p>';
    echo '<p> Code postal : ' . htmlspecialchars($v->getCP()). ' (<a href="?action=updateAdmin&ref=cp&id='.$id.'">modifier</a>)</p>';
    echo '<p> Pays : ' . htmlspecialchars($v->getPays()). ' (<a href="?action=updateAdmin&ref=pays&id='.$id.'">modifier</a>)</p>';
    ?>
