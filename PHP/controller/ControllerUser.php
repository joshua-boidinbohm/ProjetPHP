<?php
require_once File::build_path(array("model","ModelUser.php"));
require_once File::build_path(array("model", "ModelProduit.php"));
require_once File::build_path(array("lib", "Security.php"));
class ControllerUser{



    public static function readAllUser(){
        $controller='utilisateur';
        $view='list';
        $pagetitle='Liste des utilisateurs';
        $tab_v = ModelUser::getAllUsers();
        require File::build_path(array("view","view.php"));
    }

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

    public static function registered($nom, $prenom, $email, $mdp, $pays, $ville, $cp, $address){
        $user1 = new ModelUser($nom, $prenom, $email, $mdp, $pays, $ville, $cp, $address);
        $user1->save();
        $tab_v = ModelProduit::getAllProduits();
        $controller='utilisateur';
        $view='registered';
        $pagetitle='Liste des produits';
        require File::build_path(array("view", "view.php"));
    }

    public static function adminPage(){
        $controller='utilisateur';
        $view='admin';
        $pagetitle='admin';
        require File::build_path(array("view","view.php"));
    }

    public static function disconnect(){
        session_unset();
        session_destroy();
        $controller='produit';
        $view='list';
        $pagetitle='Liste des produits';
        $tab_v = ModelProduit::getAllProduits();
        require File::build_path(array("view","view.php"));
    }
}