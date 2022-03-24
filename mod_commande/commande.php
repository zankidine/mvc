<?php

class Commande
{
    private $parametre = [];
    private $oControleur; // Instance du controleur accueil

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->oControleur = new CommandeControleur($this->parametre);
    }

    /**
     * @return void
     */
    public function choixAction()
    {

        if (isset($this->parametre['action'])) {
            // une structure de type switch() / case
            switch ($this->parametre['action']) {

                case 'form_consulter':
                    $this->oControleur->form_consulter();
                    break;

                case 'form_modifier':
                    $this->oControleur->form_modifier();
                    break;
                case 'modifier':
                    $this->oControleur->modifier();
                    break;
            }

        } else {

            $this->oControleur->lister();
            //
        }
    }
}