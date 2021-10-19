<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <header>
        <nav style="border: 1px solid black;text-align:center;padding-right:1em;">
        <a href="?action=readAll">Voitures</a> 
        <a href="?action=readAll&controller=utilisateur">Utilisateurs</a>
        <a href="index.php?action=readAll&controller=trajet">Trajets</a>
        </nav>
    </header>
    <body>
    <?php
    // Si $controleur='produit' et $view='list',
    // alors $filepath="/chemin_du_site/view/produit/list.php"
    $filepath = File::build_path(array("view", $controller, "$view.php"));
    require $filepath;
    ?>
    </body>
    <footer>
        <p style="border: 1px solid black;text-align:right;padding-right:1em;">
        SolarBangala®
        </p>
    </footer>
</html>