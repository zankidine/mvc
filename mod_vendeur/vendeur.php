<?php

class Vendeur
{
    private $parametre = [];
    private $oControleur; // Instance du controleur accueil

    public function __construct($parametre){
        $this->parametre = $parametre;
        $this->oControleur = new VendeurControleur($this->parametre);
    }

    public function choixAction(){

        if(isset($this->parametre['action'])){
            // une structure de type switch() / case
            switch($this->parametre['action']){

                case 'modifier':
                    $this->oControleur->modifier();
                    break;

            }

        }else{

            $this->oControleur->form_consulter();
            //
        }

    }
}