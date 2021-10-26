<!DOCTYPE html>
    <html>
        <head>
            <title>Bienvenue !</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="src/CSS/index.css">
        </head>

        <body >
            <h1>Articles en vente</h1>

            <p>
                <?php
                    $ROOT_FOLDER = __DIR__;
                    $DS = DIRECTORY_SEPARATOR;
                    require_once "{$ROOT_FOLDER}{$DS}lib{$DS}File.php";
                    require_once File::build_path(array("controller","routeur.php"));
                ?>
            </p>
        </body>
    </html>





