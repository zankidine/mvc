<?php

class CommandeControleur
{
    private $parametre = [];
    private $oModele; //Objet
    private $oVue; // Objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;
        $this->oModele = new CommandeModele($this->parametre);
        $this->oVue = new CommandeVue($this->parametre);
    }

    public function lister()
    {

        $listeCommandes = $this->oModele->getListeCommande();
        $this->oVue->genererAffichageListe($listeCommandes);
    }

    public function form_consulter()
    {
        $uneCommande = $this->oModele->getUneCommande();
        //$this->oModele->positionVente();
        $this->oVue->genererAffichageFiche($uneCommande);
    }

    public function form_ajouter()
    {
        $prepareCommande = new CommandeTable();

        $this->oVue->genererAffichageFiche($prepareCommande);
    }

    public function form_modifier()
    {
        $uneCommande = $this->oModele->getUneCommande();
        $this->oVue->genererAffichageFiche($uneCommande);
    }

    public function modifier()
    {
        $controleCommande = new CommandeTable($this->parametre);

        if($controleCommande->getAutorisationBD() == true){

            $this->oModele->updateProduit($controleCommande);

            $this->lister();

        }else{

            $this->oVue->genererAffichageFiche($controleCommande);

        }
    }

    public function ajouter()
    {
        $controleCommande = new CommandeTable($this->parametre);

        if($controleCommande->getAutorisationBD() == true){

            $this->oModele->addCommande($controleCommande);

            $this->lister();

        }else{

            $this->oVue->genererAffichageFiche($controleCommande);

        }
    }

    public function supprimer()
    {
        $this->oModele->supprimer();
        header('Location: index.php?gestion=produit');
    }

    public function listeArchive()
    {
        $listeProduit = $this->oModele->getListeArchiveCommande();

        $this->oVue->genererAffichageListeArchive($listeProduit);
    }

    public function activerArchive()
    {
        $this->oModele->activer();
        header('Location: index.php?gestion=commande');
    }
}