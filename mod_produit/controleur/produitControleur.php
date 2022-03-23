<?php

class ProduitControleur
{
    private $parametre = [];
    private $oModele; //Objet
    private $oVue; // Objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;
        $this->oModele = new ProduitModele($this->parametre);
        $this->oVue = new ProduitVue($this->parametre);
    }

    public function lister()
    {

        $listeProduits = $this->oModele->getListeProduit();

        $this->oVue->genererAffichageListe($listeProduits);
    }

    public function form_consulter()
    {
        $unProduit = $this->oModele->getUnProduit();
        //$this->oModele->positionVente();
        $this->oVue->genererAffichageFiche($unProduit);
    }

    public function form_ajouter()
    {
        $prepareProduit = new ProduitTable();

        $this->oVue->genererAffichageFiche($prepareProduit);
    }

    public function form_modifier()
    {
        $unProduit = $this->oModele->getUnProduit();
        $this->oVue->genererAffichageFiche($unProduit);
    }

    public function modifier()
    {
        $controleProduit = new ProduitTable($this->parametre);

        if($controleProduit->getAutorisationBD() == true){

            $this->oModele->updateProduit($controleProduit);

            $this->lister();

        }else{

            $this->oVue->genererAffichageFiche($controleProduit);

        }
    }

    public function ajouter()
    {
        $controleProduit = new ProduitTable($this->parametre);

        if($controleProduit->getAutorisationBD() == true){

            $this->oModele->addProduit($controleProduit);

            $this->lister();

        }else{

            $this->oVue->genererAffichageFiche($controleProduit);

        }
    }

    public function supprimer()
    {
        $this->oModele->supprimer();
        header('Location: index.php?gestion=produit');
    }

    public function listeArchive()
    {
        $listeProduit = $this->oModele->getListeArchiveProduit();

        $this->oVue->genererAffichageListeArchive($listeProduit);
    }

    public function activerArchive()
    {
        $this->oModele->activer();
        header('Location: index.php?gestion=produit');
    }

}