<?php
session_start();
require_once File::build_path(array("model","ModelUser.php"));
require_once File::build_path(array("model", "ModelProduit.php"));
require_once File::build_path(array("lib", "Security.php"));
class ControllerUser{
    public static function readUser($email){
        if (ModelUser::getUser($email)==null){
            $controller='utilisateur';
            $view='error';
            $pagetitle='Erreur';
            require File::build_path(array("view","view.php"));
        }
        else{
            $controller='utilisateur';
            $view='detail';
            $pagetitle='Informations utilisateur';
            $v = ModelUser::getUser($email);
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

    public static function connect(){
        $controller='utilisateur';
        $view='connect';
        $pagetitle='Connexion';
        require File::build_path(array("view", "view.php"));
    }

    public static function connected($email, $mdp){
        $mdp_hasher = Security::hacher($mdp);
        if (ModelUser::checkPassword($email, $mdp) == true){
            $_SESSION['login'] = $email;
            ControllerUser::readUser($email);
        } else {
            $controller='utilisateur';
            $view='connectionerror';
            $pagetitle='Echec de la connexion';
            require File::build_path(array("view","view.php"));
        }
    }

    public static function register(){
        $controller='utilisateur';
        $view='register';
        $pagetitle='Création de compte';
        require File::build_path(array("view","view.php"));
    }

    public static function registered(){
        $user1 = new ModelUser();
        $user1->save();
        $tab_v = ModelProduit::getAllProduits();
        $controller='utilisateur';
        $view='registered';
        $pagetitle='Liste des produits';
        require File::build_path(array("view", "view.php"));
    }
}