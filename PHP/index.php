<?php
session_start();
if (!isset($_SESSION['login'])){
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > (20*60))) {
        session_unset();
        session_destroy();
    } else {
        $_SESSION['LAST_ACTIVITY'] = time();
    }
}
$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once "{$ROOT_FOLDER}{$DS}lib{$DS}File.php";
require_once File::build_path(array("controller","routeur.php"));
?>