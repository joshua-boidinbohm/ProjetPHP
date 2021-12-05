<?php

require_once File::build_path(array("model","Model.php"));
class ModelProduit{

    private $modelProduit;
    private $nomProduit;
    private $puissanceProduit;
    private $prixProduit;
    private $descriptionProduit;
    private $imageProduit;

    public function getModele() {
        return $this->modelProduit;
    }

    public function getNom(){
        return $this->nomProduit;
    }

    public function getPuissance(){
        return $this->puissanceProduit;
    }

    public function getPrix(){
        return $this->prixProduit;
    }

    public function getDesc(){
        return $this->descriptionProduit;
    }

    public function getImage(){
        return $this->imageProduit;
    }

    public function __construct($m = NULL, $n = NULL, $p = NULL, $e = NULL, $d = NULL, $i = NULL) {
        if (!is_null($m) && !is_null($n) && !is_null($p) && !is_null($e) && !is_null($d) && !is_null($i)) {
            $this->modelProduit = $m;
            $this->nomProduit = $n;
            $this->puissanceProduit = $p;
            $this->prixProduit = $e;
            $this->descriptionProduit = $d;
            $this->imageProduit = $i;
        }
    }

    public static function getAllProduits(){
        try{
            $rep = Model::getPDO()->query("SELECT * FROM Solar__Produits");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
            $tab_prod = $rep->fetchAll();
            return $tab_prod;
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> Retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function delete($mod){
        try {
            $sql = "DELETE FROM Solar__Produits WHERE modelProduit =:modele";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "modele" => $mod,
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getProduitByModele($mod) {
        try{
            $sql = "SELECT * from Solar__Produits WHERE modelProduit=:modele";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "modele" => $mod,
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
            $tab_prod = $req_prep->fetchAll();
            if (empty($tab_prod))
                return false;
            return $tab_prod[0];
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public function updateProduit($data, $value){
        try{
            $colonne = $data . 'Produit';
            $sql = "UPDATE Solar__Produits SET ". $colonne. " =:valeur WHERE modelProduit=:modele";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "valeur" => $value,
                "modele" => $this->modelProduit,
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public function save(){
        try{
            $sql = "INSERT INTO Solar__Produits (modelProduit, nomProduit, puissanceProduit, prixProduit, descriptionProduit, imageProduit) VALUES (:nam, :firstname, :email, :passwd, :country, :city)";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "nam" => $this->modelProduit,
                "firstname" => $this->nomProduit,
                "email" => $this->puissanceProduit,
                "passwd" => $this->prixProduit,
                "country" => $this->descriptionProduit,
                "city" => $this->imageProduit,
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
}