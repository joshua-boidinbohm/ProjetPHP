<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="src/CSS/design.css" rel="stylesheet">
    <title><?php echo $pagetitle; ?></title>
</head>
<header>
    <nav style="border: 1px solid black;text-align:center;padding-right:1em;">
        <a href="?action=readAll">Produits</a>
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
<footer id="footer">
    <link rel="stylesheet" href="src/CSS/style_footer.css">

    <div class="footer" id="footer_child2">
        <a class="link" href="https://theuselessweb.com/">Presse</a>
        <a class="link" href="https://theuselessweb.com/">Contactez-nous</a>
        <a class="link" href="https://theuselessweb.com">Politique de confidentialite</a>
    </div>

    <div class="footer" id="footer_child1">
        <div class="texte_indication">
            Inscrivez-vous à notre newsletter pour être au courrant de toute l'actualité
        </div>
        <div>
            <form method="post">
            <fieldset id="fieldset">
                <input pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}" required="" placeholder="yourmail@domain.com" type="email" id="email" name="email">
                <input id="valider" type="submit">
                <input type='hidden' name='action' value='newslettered'>
            </fieldset>
        </div>
    </div>

    <div  class="footer" id="footer_child3">
        <div class="texte_indication"> Suivez nous sur les réseaux :</div>
        <div id="logo_container">
            <div class="logo">
                <a href="https://facebook.com" target="_blank"><img src="src/images/Webp.net-resizeimage.png" alt="facebook" title="Y aller"></a>
            </div>
            <div class="logo">
                <a href="https://www.instagram.com/" target="_blank"><img src="src/images/Webp.net-resizeimage(2).png" alt="instagram" title="Y aller" ></a>
            </div>
            <div class="logo">
                <a href="https://twitter.com" target="_blank"><img src="src/images/Webp.net-resizeimage(3).png" alt="twitter" title="Y aller" ></a>

            </div>
        </div>
    </div>
</footer>
</html>