<?php
require_once File::build_path(array("controller","ControllerProduit.php"));
require_once File::build_path(array("controller","ControllerUser.php"));
require_once File::build_path(array("controller","ControllerCommande.php"));
$fct = array_merge(get_class_methods('ControllerProduit'), get_class_methods('ControllerUser'), get_class_methods('ControllerCommande'));
$fct1 = get_class_methods('ControllerProduit');
$fct2 = get_class_methods('ControllerUser');
$fct3 = get_class_methods('ControllerCommande');
if (isset($_GET['action'])){
    $action = $_GET['action'];
}
else {
    $action = 'readAll';
}
if (!in_array($action, $fct)){
    ControllerProduit::error();
}
else {
    if (in_array($action, $fct3)){
        ControllerCommande::$action();
    } else if (in_array($action, $fct1)) {
        if (isset($_GET['quantite'])) {
            ControllerProduit::$action($_GET['mod'], $_GET['quantite']);
        } else if ($action == "delete"){
          ControllerProduit::delete($_GET['mod']);
        } else if (isset($_GET['mod'])) {
            ControllerProduit::$action($_GET['mod']);
        } else {
            ControllerProduit::$action();
        }
    } else {
        if (isset($_GET['nonce'])){
            ControllerUser::validate($_GET['login'], $_GET['nonce']);
        } else if (isset($_POST['cp'])){
            ControllerUser::registered($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp'], $_POST['mdp2'], 'France', $_POST['ville'], $_POST['cp'], $_POST['adresse']);
        } else if (isset($_POST['mdp'])){
            ControllerUser::connected($_POST['email'], $_POST['mdp']);
        } else if (isset($_GET['id'])) {
            ControllerUser::$action($_GET['id']);
        } else if (isset($_GET['email'])) {
            ControllerUser::$action($_GET['email']);
        } else {
            ControllerUser::$action();
        }
    }
}
?>