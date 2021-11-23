<?php

require_once File::build_path(array("model","Model.php"));
Class ModelUser {
    private $idUtilisateur;
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $emailUtilisateur;
    private $mdpUtilisateur;
    private $paysUtilisateur;
    private $villeUtilisateur;
    private $adresseUtilsateur;

    public function getId() {
        return $this->idUtilisateur;
    }

    public function getNom(){
        return $this->nomUtilisateur;
    }

    public function getPrenom(){
        return $this->prenomUtilisateur;
    }

    public function getEmail(){
        return $this->emailUtilisateur;
    }

    public function getMdp(){
        return $this->mdpUtilisateur;
    }

    public function getPays(){
        return $this->paysUtilisateur;
    }

    public function getVille(){
        return $this->villeUtilisateur;
    }

    public function getAdresse(){
        return $this->adresseUtilsateur;
    }

    public function setId($i) {
        $this->idUtilisateur = $i;
    }

    public function setNom($n){
        $this->nomUtilisateur = $n;
    }

    public function setPrenom($p){
        $this->prenomUtilisateur = $p;
    }

    public function setEmail($e){
        $this->emailUtilisateur = $e;
    }

    public function setMdp($m){
        $this->mdpUtilisateur = $m;
    }

    public function setPays($paysUtilisateur){
        $this->paysUtilisateur = $paysUtilisateur;
    }

    public function setVille($villeUtilisateur){
        $this->villeUtilisateur = $villeUtilisateur;
    }

    public function setAdresse($adresseUtilsateur){
        $this->adresseUtilsateur = $adresseUtilsateur;
    }

    public function __construct($i = NULL, $n = NULL, $p = NULL, $e = NULL, $m = NULL) {
        if (!is_null($i) && !is_null($n) && !is_null($p) && !is_null($e) && !is_null($m)) {
            $this->idUtilisateur = $i;
            $this->nomUtilisateur = $n;
            $this->prenomUtilisateur = $p;
            $this->emailUtilisateur = $e;
            $this->mdpUtilisateur = $m;
        }
    }

    public static function getAllUsers(){
        try{
            $rep = Model::getPDO()->query("SELECT * FROM Solar__Utilisateurs");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
            $tab_user = $rep->fetchAll();
            return $tab_user;
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> Retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getUser($id) {
        try{
            $sql = "SELECT * from Solar__Utilisateurs WHERE idUtilisateur=:nom_tag";
            // Préparation de la requête
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "nom_tag" => $id,
            );
            $req_prep->execute($values);

            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
            $tab_user = $req_prep->fetchAll();
            if (empty($tab_user))
                return false;
            return $tab_user[0];
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> Retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function newsletter($email){
        try{
            $sql = "INSERT INTO Solar__NewsLetter(emailNewsLetter) VALUES (:mail)";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "mail" => $email,
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