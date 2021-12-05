<?php
if (ModelUser::isAdmin()){
    echo '<p>L\'utilisateur a bien été supprimé.</p>';
    require 'admin.php';
} else {
    echo '<p>Votre compte a bien été supprimé.</p>';
    require 'connect.php';
}
?>