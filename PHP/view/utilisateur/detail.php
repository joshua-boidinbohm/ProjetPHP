<?php
    echo '<h2><p> Informations de votre compte </p></h2><br>';
    echo '<p> ID : ' . htmlspecialchars($v->getID());
    echo '<p> Nom : ' . htmlspecialchars($v->getNom()). ' (<a href="?action=update&ref=nom">modifier</a>)</p>';
    echo '<p> Prénom : ' . htmlspecialchars($v->getPrenom()). ' (<a href="?action=update&ref=prenom">modifier</a>)</p>';
    echo '<p> Email : ' . htmlspecialchars($v->getEmail()). ' (<a href="?action=update&ref=email">modifier</a>)</p>';
    echo '<p><a href="?action=updateMdp">Modifier le mot de passe</a></p>';
    echo '<p> Adresse : ' . htmlspecialchars($v->getAdresse()). ' (<a href="?action=update&ref=adresse">modifier</a>)</p>';
    echo '<p> Ville : ' . htmlspecialchars($v->getVille()). ' (<a href="?action=update&ref=ville">modifier</a>)</p>';
    echo '<p> Code postal : ' . htmlspecialchars($v->getCP()). ' (<a href="?action=update&ref=cp">modifier</a>)</p>';
    echo '<p> Pays : ' . htmlspecialchars($v->getPays());
    //echo '<p><a href="?action=seeCommand&id='.$v->getID().'">(voir ses commandes)</a></p>';
    echo '<p><a href="?action=disconnect">(se déconnecter)</a></p>';
    echo '<p><a href="?action=deleteUser">Supprimer son compte</a>';
?>