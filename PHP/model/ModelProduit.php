<?php

require_once File::build_path(array("model","Model.php"));
class ModelProduit{

    private $modelProduit;
    private $nomProduit;
    private $puissanceProduit;
    private $prixProduit;
    private $descriptionProduit;

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

    public function setModele($m) {
        $this->modelProduit = $m;
    }

    public function setNom($n){
        $this->nomProduit = $n;
    }

    public function setPuissance($p){
        $this->puissanceProduit = $p;
    }

    public function getImage() {
        return $this->image;
    }

    public function __construct($m = NULL, $n = NULL, $p = NULL, $e = NULL, $d = NULL) {
        if (!is_null($m) && !is_null($n) && !is_null($p) && !is_null($e) && !is_null($d)) {
            $this->modelProduit = $m;
            $this->nomProduit = $n;
            $this->puissanceProduit = $p;
            $this->prixProduit = $e;
            $this->descriptionProduit = $d;
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
}