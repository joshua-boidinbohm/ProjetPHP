<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="src/CSS/design.css" rel="stylesheet">
    <link href="src/CSS/produit.css" rel="stylesheet">
    <title><?php echo $pagetitle; ?></title>
</head>
<header>
    <link href="src/CSS/style_header.css" rel="stylesheet">
        <div class="small" id="header-scroll">
            <h1 id="titreSite"><a href="#">SolarBangala</a></h1>
            <nav>
                <ul>
                    <li><a href="?action=readAll">Produits</a></li>
                    <li><a href="?action=readAll&controller=utilisateur">Utilisateurs</a></li>
                    <li><a href="index.php?action=connect">Trajets</a></li>
                    <li><a id="panier" href="index.php?action=panier">Panier</a></li>
                    <div id="connexion">
                            <input type="submit" value="connexion" href="?action=connect">
                        </div>
                </ul>

            </nav>

        </div>
    </header>
</header>
<main>
    <body>
        <?php
            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;
        ?>
    </body>
</main>

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
            <form method="get">
            <fieldset id="fieldset">
                <input pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}" type="email" placeholder="yourmail@domain.com" id="email" name="email" required>
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