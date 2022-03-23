<?php
// Rôle de routeur

/**
 * Routeur du module accueil
 */
class Accueil{

    private $parametre = [];
    private $oControleur; // Instance du controleur accueil

    public function __construct($parametre){

        $this->parametre = $parametre;
//        require_once 'mod_accueil/controleur/accueilControleur.php';
        $this->oControleur = new AccueilControleur($this->parametre);

    }

    public function choixAction(){

        // une structure de type switch() / case

        $this->oControleur->lister();
    }

}