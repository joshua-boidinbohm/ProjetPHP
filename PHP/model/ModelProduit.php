<?php

require_once File::build_path(array("model","Model.php"));
class ModelProduit{

    private $modelProduit;
    private $nomProduit;
    private $puissanceProduit;

    public function getModele() {
        return $this->modelProduit;
    }

    public function getNom(){
        return $this->nomProduit;
    }

    public function getPuissance(){
        return $this->puissanceProduit;
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

    public function __construct($m = NULL, $n = NULL, $p = NULL) {
        if (!is_null($m) && !is_null($n) && !is_null($p)) {
            // Si aucun de $m et $p sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 2 arguments
            $this->modelProduit = $m;
            $this->nomProduit = $n;
            $this->puissanceProduit = $p;
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

    public static function getProduitByModele($mod) {
        try{
            $sql = "SELECT * from Solar__Produits WHERE modelProduit=:nom_tag";
            // Préparation de la requête
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "nom_tag" => $mod,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
            $tab_prod = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_prod))
                return false;
            return $tab_prod[0];
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