<?php

class Produit
{
    private $parametre = [];
    private $oControleur; // Instance du controleur accueil

    public function __construct($parametre){
        $this->parametre = $parametre;
        $this->oControleur = new ProduitControleur($this->parametre);
    }

    public function choixAction(){

        if(isset($this->parametre['action'])){
            // une structure de type switch() / case
            switch($this->parametre['action']){

                case 'form_consulter':
                    $this->oControleur->form_consulter();
                    break;

                case 'form_ajouter':
                    $this->oControleur->form_ajouter();
                    break;
                case 'form_modifier':
                    $this->oControleur->form_modifier();
                    break;
                case 'modifier':
                    $this->oControleur->modifier();
                    break;
                case 'ajouter':
                    $this->oControleur->ajouter();
                    break;
                case 'supprimer':
                    $this->oControleur->supprimer();
                    break;
                case 'archiver':
                    $this->oControleur->listeArchive();
                    break;
                case 'activer':
                    $this->oControleur->activerArchive();
                    break;

            }

        }else{

            $this->oControleur->lister();
            //
        }


    }
}