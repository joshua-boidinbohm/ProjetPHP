<?php

namespace model;

Class ModelUser {
    private $login;
    private $nom;
    private $prenom;

    public function __construct($data = array()){
        if (!empty($data)){
            $this->login = $data['login'];
            $this->nom = $data['nom'];
            $this->prenom = $data['prenom'];
        }
    }

    public static function getAllUtilisateurs(){
        try{
            $rep = Model::getPDO()->query("SELECT * FROM Utilisateur");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
            $tab_user = $rep->fetchAll();
            return $tab_user;
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public function afficher() {
        echo "Utilisateur {$this->prenom} {$this->nom} de login {$this->login}";
    }
}
?>