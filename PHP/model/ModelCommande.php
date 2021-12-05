<?php
require_once File::build_path(array("model","Model.php"));
class ModelCommande
{
    private $idCommande;
    private $idClient;
    private $contenuCommande;
    private $montantCommande;
    private $dateCommande;

    public function getIdCommande()
    {
        return $this->idCommande;
    }

    public function getIdClient()
    {
        return $this->idClient;
    }

    public function getContenu()
    {
        return $this->contenuCommande;
    }

    public function getMontant()
    {
        return $this->montantCommande;
    }

    public function getDate()
    {
        return $this->dateCommande;
    }

    public function __construct($j = NULL, $c = NULL, $m = NULL, $d = NULL) {
        if (!is_null($j) && !is_null($c) && !is_null($m) && !is_null($d)) {
            $this->idCommande = NULL;
            $this->idClient = $j;
            $this->contenuCommande = $c;
            $this->montantCommande = $m;
            $this->dateCommande = $d;
        }
    }

    public static function getAllCommandes(){
        try{
            $rep = Model::getPDO()->query("SELECT * FROM Solar__Commandes");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
            $tab_com = $rep->fetchAll();
            return $tab_com;
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href=""> Retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getCommande($id) {
        try{
            $sql = "SELECT * from Solar__Commandes WHERE idCommande=:id";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "id" => $id,
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
            $tab_com = $req_prep->fetchAll();
            if (empty($tab_com))
                return false;
            return $tab_com[0];
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
            $sql = "INSERT INTO Solar__Commandes (idCommande, idClient, contenuCommande, montantCommande, dateCommande) VALUES (NULL, :firstname, :email, :passwd, :country)";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "firstname" => $this->idClient,
                "email" => $this->contenuCommande,
                "passwd" => $this->montantCommande,
                "country" => $this->dateCommande,
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
?>