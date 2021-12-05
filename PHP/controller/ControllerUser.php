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

    public static function readUserAdmin($email){
        if (ModelUser::getUser($email)==null){
            $controller='utilisateur';
            $view='error';
            $pagetitle='Erreur';
            require File::build_path(array("view","view.php"));
        }
        else{
            $controller='utilisateur';
            $view='detailAdmin';
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
        //$mdp = Security::hacher($mdp);
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

    public static function registered($nom, $prenom, $email, $mdp, $mdp2, $pays, $ville, $cp, $address){
        if ($mdp == $mdp2) {
            //$mdp = Security::hacher($mdp);
            $user1 = new ModelUser($nom, $prenom, $email, $mdp, $pays, $ville, $cp, $address);
            $user1->save();
            $tab_v = ModelProduit::getAllProduits();
            $controller = 'utilisateur';
            $view = 'registered';
            $pagetitle = 'Liste des produits';
            require File::build_path(array("view", "view.php"));
        } else {
            $controller = 'utilisateur';
            $view = 'errorRegister';
            $pagetitle = 'Création de compte';
            require File::build_path(array("view", "view.php"));
        }
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

    public static function update(){
        if (!isset($_GET['ref']) || $_GET['ref'] == 'id' || $_GET['ref'] == 'mdp' || $_GET['ref'] == 'admin' || !isset($_SESSION['login'])){
            $controller = 'produit';
            $view = 'error2';
            $pagetitle = 'Erreur';
            require File::build_path(array("view", "view.php"));
        } else {
            $controller = 'utilisateur';
            $view = 'update';
            $pagetitle = 'Modifier';
            $v = ModelUser::getUser($_SESSION['login']);
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function updated(){
        $v = ModelUser::getUser($_SESSION['login']);
        $v->update($_GET['ref'], $_POST['value']);
        ControllerUser::readUser($_SESSION['login']);
    }

    public static function updateMdp(){
        $controller='utilisateur';
        $view='updateMdp';
        $pagetitle='Modifier le mot de passe';
        require File::build_path(array("view","view.php"));
    }

    public static function updatedMdp(){
        if ($_POST['newpasswd'] == $_POST['newpasswd2']){
            //$oldpasswd = Security::hacher($_POST['oldpasswd']);
            if (ModelUser::checkPassword($_SESSION['login'], $_POST['oldpasswd']) == true){
                //$newpasswd = Security::hacher($_POST['newpasswd']);
                $v = ModelUser::getUser($_SESSION['login']);
                $v->updateMdp($_POST['newpasswd']);
                ControllerUser::readUser($_SESSION['login']);
            } else {
                $controller = 'utilisateur';
                $view = 'errorUpMdp2';
                $pagetitle = 'Modifier le mot de passe';
                require File::build_path(array("view", "view.php"));
            }
        } else {
            $controller = 'utilisateur';
            $view = 'errorUpMdp1';
            $pagetitle = 'Modifier le mot de passe';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function deleteUser(){
        if (!isset($_SESSION['login'])){
            $controller = 'produit';
            $view = 'error2';
            $pagetitle = 'Erreur';
            require File::build_path(array("view", "view.php"));
        } else if (ModelUser::isAdmin(ModelUser::getUser($_SESSION['login'])->getID())){
            $controller = 'utilisateur';
            $view = 'verifDelete';
            $pagetitle = 'Etes-vous sûr ?';
            $id = $_GET['id'];
            require File::build_path(array("view", "view.php"));
        } else {
            $controller = 'utilisateur';
            $view = 'verifDelete';
            $pagetitle = 'Etes-vous sûr ?';
            $id = ModelUser::getUser($_SESSION['login'])->getID();
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function deletedUser(){
        $controller = 'utilisateur';
        $view = 'deletedUser';
        if (ModelUser::isAdmin(ModelUser::getUser($_SESSION['login'])->getID())) {
            ModelUser::deleteUser($_GET['id']);
            $pagetitle = 'admin';
        } else {
            ModelUser::deleteUser(ModelUser::getUser($_SESSION['login'])->getID());
            $pagetitle = 'Liste des produits';
        }
        require File::build_path(array("view", "view.php"));
    }
}