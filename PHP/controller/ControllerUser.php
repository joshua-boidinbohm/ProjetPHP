<?php

require_once File::build_path(array("model","ModelUser.php"));
class ControllerUser{
    public static function readUser($id){
        if (ModelProduit::getProduitByModele($id)==null){
            $controller='user';
            $view='error';
            $pagetitle='Erreur';
            require File::build_path(array("view","view.php"));
        }
        else{
            $controller='user';
            $view='detail';
            $pagetitle='Informations utilisateur';
            $v = ModelProduit::getProduitByModele($id);
            require File::build_path(array("view","view.php"));
        }
    }
}