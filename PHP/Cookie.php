<?php
    $v = $_GET['libelle'];
    require "?action=read&mod=$v";
    $_SESSION['listeAchats']= array($_GET['libelle'], $_GET['quantite']);
?>