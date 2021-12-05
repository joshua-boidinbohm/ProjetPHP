<?php
require_once File::build_path(array("model","ModelProduit.php"));
require_once File::build_path(array("model","ModelUser.php"));
require_once File::build_path(array("controller","ControllerUser.php"));
class ControllerProduit{
    public static function readAll() {
        $controller='produit';
        $view='list';
        $pagetitle='Liste des produits';
        $tab_v = ModelProduit::getAllProduits();
        require File::build_path(array("view","view.php"));
    }

    public static function read($mod){
        if (ModelProduit::getProduitByModele($mod)==null){
            $controller='produit';
            $view='error';
            $pagetitle='Erreur';
            require File::build_path(array("view","view.php"));
        }
        else{
            $controller='produit';
            $view='detail';
            $pagetitle='Details du produit';
            $v = ModelProduit::getProduitByModele($mod);
            require File::build_path(array("view","view.php"));
        }
    }

    public static function delete($mod){
        if (ModelUser::isAdmin(ModelUser::getUser($_SESSION['login'])->getID())) {
            ModelProduit::delete($mod);
            $model = $mod;
            $controller = 'utilisateur';
            $view = 'deleted';
            $pagetitle = 'admin';
            require File::build_path(array("view", "view.php"));
        } else {
            ControllerProduit::error();
        }
    }

    public static function error(){
        $controller='produit';
        $view='error2';
        $pagetitle='Erreur';
        require File::build_path(array("view", "view.php"));
    }

    public static function panier(){
        $controller='produit';
        $view='panier';
        $pagetitle='Panier';
        require File::build_path(array("view", "view.php"));
    }

    public static function create(){
        $controller='produit';
        $view='create';
        $pagetitle='Ajouter un produit';
        require File::build_path(array("view", "view.php"));
    }

    public static function created(){
        $product = new ModelProduit($_POST['mod'], $_POST['nom'], $_POST['puissance'], $_POST['prix'], $_POST['description'], $_POST['image']);
        $product->save();
        ControllerUser::adminPage();
    }

    public static function addPanier($v, $quantite){
        if (isset($_SESSION[$v])) {
            $panier = $_SESSION[$v];
            $panier[1] += $quantite;
            $_SESSION[$v] = $panier;
        }
        else {
            $panier[0] = $v;
            $panier[1] = $quantite;
            $_SESSION[$v] = $panier;
        }
        ControllerProduit::read($v);
    }

    public static function updateProduit(){
        if (!isset($_GET['ref']) || !ModelUser::isAdmin()){
            $controller = 'produit';
            $view = 'error2';
            $pagetitle = 'Erreur';
            require File::build_path(array("view", "view.php"));
        } else {
            $controller = 'produit';
            $view = 'update';
            $pagetitle = 'Modifier';
            $v = ModelProduit::getProduitByModele($_GET['mod']);
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function updatedProduit(){
        if (!ModelUser::isAdmin()){
            $controller = 'produit';
            $view = 'error2';
            $pagetitle = 'Erreur';
            require File::build_path(array("view", "view.php"));
        } else {
            $v = ModelProduit::getProduitByModele($_GET['mod']);
            $v->updateProduit($_GET['ref'], $_POST['value']);
            ControllerUser::adminPage();
        }
    }

    public static function readAdmin($mod){
        if (ModelProduit::getProduitByModele($mod)==null){
            $controller='produit';
            $view='error';
            $pagetitle='Erreur';
            require File::build_path(array("view","view.php"));
        }
        else{
            $controller='produit';
            $view='detailAdmin';
            $pagetitle='Details du produit';
            $v = ModelProduit::getProduitByModele($mod);
            require File::build_path(array("view","view.php"));
        }
    }
}
?>