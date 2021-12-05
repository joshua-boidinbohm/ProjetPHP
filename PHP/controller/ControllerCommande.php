<?php
require_once File::build_path(array("model","ModelCommande.php"));
require_once File::build_path(array("model","ModelProduit.php"));
require_once File::build_path(array("model","ModelUser.php"));
class ControllerCommande
{

    public static function readCom(){
        if (ModelCommande::getCommande($_GET['id'])==NULL){
            $controller='produit';
            $view='error';
            $pagetitle='Erreur';
            require File::build_path(array("view","view.php"));
        }
        else{
            $controller='produit';
            $view='detailCom';
            $pagetitle='Details de la commande';
            $v = ModelCommande::getCommande($_GET['id']);
            require File::build_path(array("view","view.php"));
        }
    }

    public static function command()
    {
        if (isset($_SESSION['login'])){
            $tab_prod = ModelProduit::getAllProduits();
            for ($i = 0; $i < count($tab_prod); $i++) {
                $tab_noms[$i] = $tab_prod[$i]->getModele();
            }
            $total = 0;
            $i = 0;
            foreach ($_SESSION as $key => $value) {
                if (in_array($value[0], $tab_noms)) {
                    $total = $total + $value[1] * ModelProduit::getProduitByModele($value[0])->getPrix();
                    $i++;
                    $tab_commande[$i][0] = $value[0];
                    $tab_commande[$i][1] = $value[1];
                }
            }
            $idClient = ModelUser::getUser($_SESSION['login'])->getID();
            $tab_com = serialize($tab_commande);
            $date = date('Y-m-d h:i:s a');
            $commande = new ModelCommande($idClient, $tab_com, $total, $date);
            $commande->save();
        } else {
            ControllerUser::connect();
        }
    }
}
?>