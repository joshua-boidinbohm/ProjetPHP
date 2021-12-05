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
    private $cpUtilisateur;
    private $adresseUtilisateur;
    private $admin;

    public function getID(){
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

    public function getCP(){
        return $this->cpUtilisateur;
    }

    public function getAdresse(){
        return $this->adresseUtilisateur;
    }

    public function getAdmin(){
        return $this->admin;
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
        $this->adresseUtilisateur = $a;
    }

    public function __construct($n = NULL, $p = NULL, $e = NULL, $m = NULL, $c = NULL, $v = NULL, $cp = NULL, $a = NULL) {
        if (!is_null($n) && !is_null($p) && !is_null($e) && !is_null($m) && !is_null($c) && !is_null($v) && !is_null($cp) && !is_null($a)) {
            $this->idUtilisateur = NULL;
            $this->nomUtilisateur = $n;
            $this->prenomUtilisateur = $p;
            $this->emailUtilisateur = $e;
            $this->mdpUtilisateur = $m;
            $this->paysUtilisateur = $c;
            $this->villeUtilisateur = $v;
            $this->cpUtilisateur = $cp;
            $this->adresseUtilisateur = $a;
            $this->admin = '0';
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
            $sql = "SELECT * from Solar__Utilisateurs WHERE emailUtilisateur=:email";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "email" => $email,
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

    public static function getUserByID($id){
        try{
            $sql = "SELECT * from Solar__Utilisateurs WHERE idUtilisateur=:id";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "id" => $id,
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
            $sql = "INSERT INTO Solar__Utilisateurs (idUtilisateur, nomUtilisateur, prenomUtilisateur, emailUtilisateur, mdpUtilisateur, paysUtilisateur, villeUtilisateur, cpUtilisateur, adresseUtilisateur, admin) VALUES (NULL, :nam, :firstname, :email, :passwd, :country, :city, :post, :address, '0')";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "nam" => $this->nomUtilisateur,
                "firstname" => $this->prenomUtilisateur,
                "email" => $this->emailUtilisateur,
                "passwd" => $this->mdpUtilisateur,
                "country" => $this->paysUtilisateur,
                "city" => $this->villeUtilisateur,
                "post" => $this->cpUtilisateur,
                "address" => $this->adresseUtilisateur,
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

    public static function isAdmin(){
        if (isset($_SESSION['login']) && ModelUser::getUser($_SESSION['login'])->getAdmin() == '1'){
            return true;
        } else {
            return false;
        }
    }

    public static function deleteUser($id){
        try{
            $sql = "DELETE FROM Solar__Utilisateurs WHERE idUtilisateur=:id";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "id" => $id,
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

    public function update($data, $value){
        try{
            if (!$data == 'id' && !$data == 'mdp'){
                $colonne = $data . 'Utilisateur';
                $sql = "UPDATE Solar__Utilisateurs SET ". $colonne. " =:valeur WHERE idUtilisateur=:idi";
                $req_prep = Model::getPDO()->prepare($sql);
                $values = array(
                    "valeur" => $value,
                    "idi" => $this->idUtilisateur,
                );
                $req_prep->execute($values);
                $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
            }
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public function updateMdp($value){
        try{
                $sql = "UPDATE Solar__Utilisateurs SET mdpUtilisateur =:valeur WHERE idUtilisateur=:idi";
                $req_prep = Model::getPDO()->prepare($sql);
                $values = array(
                    "valeur" => $value,
                    "idi" => $this->idUtilisateur,
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

    public static function getAllEmails(){
        try{
            $rep = Model::getPDO()->query("SELECT emailUtilisateur FROM Solar__Utilisateurs");
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

    public static function exist(){
        $tab_email = ModelUser::getAllEmails();
        if (in_array($_SESSION['login'], $tab_email)){
            return true;
        } else {
            return false;
        }
    }
}
?>