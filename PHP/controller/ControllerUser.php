<?php

require_once File::build_path(array("model","ModelUser.php"));
require_once File::build_path(array("model", "ModelProduit.php"));
class ControllerUser{
    public static function readUser($id){
        if (ModelUser::getUser($id)==null){
            $controller='utilisateur';
            $view='error';
            $pagetitle='Erreur';
            require File::build_path(array("view","view.php"));
        }
        else{
            $controller='utilisateur';
            $view='detail';
            $pagetitle='Informations utilisateur';
            $v = ModelUser::getUser($id);
            require File::build_path(array("view","view.php"));
        }
    }

    public static function newslettered($email){
        ModelUser::newsletter($email);
        $tab_v = ModelProduit::getAllProduits();
        $controller='produit';
        $view='newslettered';
        $pagetitle='Liste des produits';
        require File::build_path(array("view", "view.php"));
    }
}