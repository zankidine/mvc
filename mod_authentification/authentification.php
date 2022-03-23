<?php

class authentification
{
    private $parametre = [];
    private $oControleur; // Instance du controleur authentification

    public function __construct($parametre){
        $this->parametre = $parametre;
        $this->oControleur = new AuthentificationControlleur($this->parametre);
    }

    public function choixAction(){

        if(isset($this->parametre['action'])){
            // une structure de type switch() / case
            switch($this->parametre['action']){

                //
                case 'authentifier':
                    $this->oControleur->authentifier();
                    break;
                case 'deconnecter':
                    $this->oControleur->deconnecter();
                    break;

            }

        }else{

           // Par défaut affichage du formulaire vierge
            $this->oControleur->form_authentifier();
        }




    }
}