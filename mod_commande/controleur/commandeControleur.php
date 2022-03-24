<?php

class CommandeControleur
{
    private $parametre = [];
    private $oModele; //Objet
    private $oVue; // Objet

    /**
     * @param $parametre
     */
    public function __construct($parametre)
    {

        $this->parametre = $parametre;
        $this->oModele = new CommandeModele($this->parametre);
        $this->oVue = new CommandeVue($this->parametre);
    }

    /**
     * Lister les commandes non supprimer logiquement
     * @return void
     */
    public function lister()
    {

        $listeCommandes = $this->oModele->getListeCommande();
        $this->oVue->genererAffichageListe($listeCommandes);
    }

    /**
     * Renvoi seulement le formulaire pour la consultation
     * @return void
     */
    public function form_consulter()
    {
        $uneCommande = $this->oModele->getUneCommande();
        $uneCommande->setListeLigneCommande($this->oModele->getLignesCommande());
        $uneCommande->setClient($this->oModele->getUnClient(intval($uneCommande->getCodec())));
        $this->oVue->genererAffichageFiche($uneCommande);
    }

    /**
     * Renvoi seulement le formulaire(vide) pour l'ajout
     * @return void
     */
    public function form_ajouter()
    {
        $prepareCommande = new CommandeTable();

        $this->oVue->genererAffichageFiche($prepareCommande);
    }

    /**
     * Renvoi seulement le formulaire pour la modification
     * @return void
     */
    public function form_modifier()
    {
        $uneCommande = $this->oModele->getUneCommande();
        $this->oVue->genererAffichageFiche($uneCommande);
    }

    /**
     * Modification d'une commande
     * @return void
     */
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

    /**
     * Création / Ajout d'une commande
     * @return void
     */
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

    /**
     * Suppression logique d'un élément
     * @return void
     */
    public function supprimer()
    {
        $this->oModele->supprimer();
        header('Location: index.php?gestion=produit');
    }

    /**
     * Liste les éléments supprimer logiquement de la base de données (1)
     * @return void
     */
    public function listeArchive()
    {
        $listeProduit = $this->oModele->getListeArchiveCommande();

        $this->oVue->genererAffichageListeArchive($listeProduit);
    }

    /**
     * Activer les éléments supprimer logiquement dans la base de données
     * @return void
     */
    public function activerArchive()
    {
        $this->oModele->activer();
        header('Location: index.php?gestion=commande');
    }
}