<?php

class VendeurControleur
{
    private $parametre = [];
    private $oModele; //Objet
    private $oVue; // Objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;
        $this->oModele = new VendeurModele($this->parametre);
        $this->oVue = new VendeurVue($this->parametre);
    }

    public function form_consulter()
    {
        $unVendeur = $this->oModele->getUnVendeur();
        // Récupère le chiffre d'affaire du vendeur grâce à la méthode caVendeur()
        $caVendeur = $this->oModele->caVendeur($unVendeur);
        $unVendeur->setCavendeur($caVendeur['CA']);

        $this->oVue->genererAffichageFiche($unVendeur);
    }


    public function form_modifier()
    {
        $unVendeur = $this->oModele->getUnVendeur();
        //$this->oVue->genererAffichageFiche($unProduit);
    }

    public function modifier()
    {
        $controleVendeur = new VendeurTable($this->parametre);

        if($controleVendeur->getAutorisationBD() == true){

            $this->oModele->updateVendeur($controleVendeur);

            header('Location: index.php?gestion=vendeur' );

        }else{

            //$this->oVue->genererAffichageFiche($controleVendeur);

        }
    }


}