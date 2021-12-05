<?php
if (ModelUser::isAdmin(ModelUser::getUser($_SESSION['login'])->getID())){
    echo '<p>L\'utilisateur a bien été supprimé.</p>';
    require 'admin.php';
} else {
    ControllerUser::disconnect();
    echo '<p>Votre compte a bien été supprimé.</p>';
    require 'connect.php';
}
?>