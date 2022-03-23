<?php

class AuthentificationControlleur
{
    private $parametre = [];
    private $oModele; //Objet
    private $oVue; // Objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;
        $this->oModele = new authentificationModele($this->parametre);
        $this->oVue = new authentificationVue($this->parametre);
    }
    public function authentifier()
    {
        //
        $controleAuthentification = new authentificationTable($this->parametre);

        if($controleAuthentification->getAutorisationSession() == false || $this->oModele->rechercheVendeur($controleAuthentification) == false)
        {
            $this->oVue->genererAffichage( $controleAuthentification);
        } else
        {
            header('Location:index.php');
        }
    }

    public function deconnecter()
    {
        //
        session_destroy();
        $_SESSION = [];
        header('Location:index.php');
    }

    public function form_authentifier()
    {
        //
        $preparationAuthentifier = new authentificationTable();
        $this->oVue->genererAffichage( $preparationAuthentifier);
    }

}