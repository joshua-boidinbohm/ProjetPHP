<?php
    // ajouter session start index.php


    $_SESSION['listeAchats']= array('article' => $_GET['libelle'],
                                    'quantite' => $_GET['quantite']);

    if (isset($_SESSION['listeAchats'])){
        var_dump($_SESSION['listeAchats']);
}
?>