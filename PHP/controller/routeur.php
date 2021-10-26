<?php
require_once File::build_path(array("controller","ControllerProduit.php"));
require_once File::build_path(array("controller","ControllerUser.php"));
$fct = array_merge(get_class_methods('ControllerProduit'), get_class_methods('ControllerUser'));
$fct1 = get_class_methods('ControllerProduit');
$fct2 = get_class_methods('ControllerUser');
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
    if (in_array($action, $fct1)) {
        if (isset($_GET['mod'])) {
            ControllerProduit::$action($_GET['mod']);
        } else {
            ControllerProduit::$action();
        }
    }
    else {
        if (isset($_GET['id'])) {
            ControllerUser::$action($_GET['id']);
        } else if (isset($_POST['email'])) {
            ControllerUser::$action($_POST['email']);
        } else {
            ControllerUser::$action();
        }
    }
}
?>