<?php

require_once File::build_path(array("model","Model.php"));
Class ModelUser {
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $emailUtilisateur;
    private $mdpUtilisateur;
    private $paysUtilisateur;
    private $villeUtilisateur;
    private $cpUtilisateur;
    private $adresseUtilsateur;

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

    public function getCP(){
        return $this->cpUtilisateur;
    }

    public function getAdresse(){
        return $this->adresseUtilsateur;
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

    public function setPays($c){
        $this->paysUtilisateur = $c;
    }

    public function setVille($v){
        $this->villeUtilisateur = $v;
    }

    public function setCP($cp){
        $this->cpUtilisateur = $cp;
    }

    public function setAdresse($a){
        $this->adresseUtilsateur = $a;
    }

    public function __construct($i = NULL, $n = NULL, $p = NULL, $e = NULL, $m = NULL, $c = NULL, $v = NULL, $cp = NULL, $a = NULL) {
        if (!is_null($i) && !is_null($n) && !is_null($p) && !is_null($e) && !is_null($m) && !is_null($c) && !is_null($v) && !is_null($cp) && !is_null($a)) {
            $this->nomUtilisateur = $n;
            $this->prenomUtilisateur = $p;
            $this->emailUtilisateur = $e;
            $this->mdpUtilisateur = $m;
            $this->paysUtilisateur = $c;
            $this->villeUtilisateur = $v;
            $this->cpUtilisateur = $cp;
            $this->adresseUtilsateur = $a;
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

    public static function getUser($email) {
        try{
            $sql = "SELECT * from Solar__Utilisateurs WHERE emailUtilisateur=:mail";
            // Préparation de la requête
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "mail" => $email,
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

    public function save(){
        try{
            $sql = "INSERT INTO Solar__Utilisateurs (nomUtilisateur, prenomUtilisateur, emailUtilisateur, mdpUtilisateur, paysUtilisateur, villeUtilisateur, cpUtilisateur, adresseUtilisateur) VALUES (:nam, :firstname, :email, :passwd, :country, :city, :post, :address)";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "nam" => $this->nomUtilisateur,
                "firstname" => $this->prenomUtilisateur,
                "email" => $this->emailUtilisateur,
                "passwd" => $this->mdpUtilisateur,
                "country" => $this->paysUtilisateur,
                "city" => $this->villeUtilisateur,
                "post" => $this->cpUtilisateur,
                "address" => $this->adresseUtilsateur,
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

    public static function deleteUser($email){
        try{
            $sql = "DELETE FROM Solar__Utilisateurs WHERE immatriculation =:compte";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "compte" => $email,
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function update($data){
        try{
            $sql = "UPDATE FROM Solar__Utilsateurs SET nomUtilisateur=:nam, prenomUtilisateur=:firstname, emailUtilisateur=:email, mdpUtilisateur=:passwd, paysUtilisateur=:country, villeUtilisateur=:city, cpUtilisateur=:post, adresseUtilisateur=:address,  WHERE idUtilisateur =:compt";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "id" => $data['id'],
                "nam" => $data['nom'],
                "firstname" => $data['prenom'],
                "email" => $data['email'],
                "passwd" => $data['mdp'],
                "country" => $data['pays'],
                "city" => $data['ville'],
                "post" => $data['cp'],
                "address" => $data['adresse'],
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public function getIDUser($email){
        try{
            $sql = "SELECT idUtilisateur from Solar__Utilisateurs WHERE emailUtilisateur=:mail";
            // Préparation de la requête
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "mail" => $email,
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

    public static function checkPassword($login, $mot_de_passe_hache){
        try{
            $sql = "SELECT * from Solar__Utilisateurs WHERE emailUtilisateur=:email AND mdpUtilisateur=:mdp";
            // Préparation de la requête
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "email" => $login,
                "mdp" => $mot_de_passe_hache,
            );
            $req_prep->execute($values);

            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
            $tab_user = $req_prep->fetchAll();
            if (!empty($tab_user)) {
                return true;
            }
            else{
                return false;
            }
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> Retour a la page d\'accueil </a>';
            }
            die();
        }
    }
}
?>