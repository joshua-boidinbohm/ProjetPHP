<?php
require_once File::build_path(array("model","ModelProduit.php"));
class ControllerProduit{
    public static function readAll() {
        $controller='produit';
        $view='list';
        $pagetitle='Liste des produits';
        $tab_v = ModelProduit::getAllProduits();     //appel au modèle pour gerer la BD
        require File::build_path(array("view","view.php"));  //"redirige" vers la vue
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
}
?>