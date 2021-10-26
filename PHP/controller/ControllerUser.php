<?php

require_once File::build_path(array("model","ModelUser.php"));
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
}