<?php
require_once File::build_path(array("controller","ControllerProduit.php"));
require_once File::build_path(array("controller","ControllerUser.php"));
$fct = get_class_methods('ControllerProduit');
$fct = get_class_methods('ControllerUser');
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
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'readAll';
    }
    if (isset($_GET['mod'])) {
        ControllerProduit::$action($_GET['mod']);
    }
    else{
        ControllerProduit::$action();
    }
}
?>