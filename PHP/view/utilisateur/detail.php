<?php
    echo '<h2><p> Informations de votre compte </p></h2><br>';
    echo '<p> ID : ' . $v->getID();
    echo '<p> Nom : ' . $v->getNom(). ' (<a href="?action=update&ref=nom">modifier</a>)</p>';
    echo '<p> Prénom : ' . $v->getPrenom(). ' (<a href="?action=update&ref=prenom">modifier</a>)</p>';
    echo '<p> Email : ' . $v->getEmail(). ' (<a href="?action=update&ref=email">modifier</a>)</p>';
    echo '<p><a href="?action=updateMdp">Modifier le mot de passe</a></p>';
    echo '<p> Adresse : ' . $v->getAdresse(). ' (<a href="?action=update&ref=adresse">modifier</a>)</p>';
    echo '<p> Ville : ' . $v->getVille(). ' (<a href="?action=update&ref=ville">modifier</a>)</p>';
    echo '<p> Code postal : ' . $v->getCP(). ' (<a href="?action=update&ref=cp">modifier</a>)</p>';
    echo '<p> Pays : ' . $v->getPays();
    echo '<p><a href="?action=disconnect">(se déconnecter)</a></p>';
?>