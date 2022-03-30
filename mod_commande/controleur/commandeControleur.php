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
     * Lister les commandes non supprimer logiquement
     * @return void
     */
    public function listerCommandeNonValidee()
    {

        $listeCommandes = $this->oModele->getListeCommandeNonValidee();
        $this->oVue->genererAffichageListeNonValidee($listeCommandes);
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
        //var_dump($this->parametre);
        $uneCommande = $this->oModele->getUneCommande();
        $uneCommande->setListeLigneCommande($this->oModele->getLignesCommande());
        $uneCommande->setClient($this->oModele->getUnClient($uneCommande->getCodec()));
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

    public function finaliser()
    {
        $this->oModele->finaliser();
        header('Location: index.php?gestion=commande');
    }

    public function modifierDateLivraison()
    {
        $this->oModele->modifierDateLivraison();
        header('Location: index.php?gestion=commande');
    }

    public function modifierLigneCommande()
    {
        $this->oModele->modifierLigneCommande();
        header('Location: index.php?gestion=commande');
    }

    public function form_commande()
    {
        $listeProduits = $this->oModele->getListeProduit();
        $analyse = $this->oModele->MontantTvaEtMarge();
        $nbrLigne = count($this->oModele->listePanier());
        $this->oVue->genererAffichageListeProduitCommande($listeProduits, $analyse, $nbrLigne);
    }

    public function ajouterPanier()
    {
        $this->oModele->addLigne();

        header('Location: index.php?gestion=commande&action=form_commande');
    }

    public function voirPanier()
    {
        $listePanier = $this->oModele->listePanier();
        $analyse = $this->oModele->MontantTvaEtMarge();
        $this->oVue->genererAffichagePanier($listePanier, $analyse);
    }

    public function modifierLigne()
    {
        $this->oModele->updateLigne();
        header('Location: index.php?gestion=commande&action=panier');
    }

    public function supprimerLigne()
    {
        $this->oModele->deleteLigne();
        header('Location: index.php?gestion=commande&action=panier');
    }

    public function viderPanier()
    {
        $this->oModele->viderPanier();
        header('Location: index.php?gestion=commande&action=form_commande');
    }

    public function sauvegarder()
    {
        $listeClient = $this->oModele->listeClient();
        $listeLignePanier = $this->oModele->listePanier();
        $nomVendeur =  $_SESSION['prenomNom'];
        $vendeur = $this->oModele->getUnVendeur();
        $analyse = $this->oModele->MontantTvaEtMarge();
        $this->oVue->genererAffichageFicheVide($listeClient, $nomVendeur, $listeLignePanier,$analyse,$vendeur);
    }


    public function valider()
    {
        // Création d'une nouvelle commande
        $this->oModele->newCommande();
        header('Location: index.php?gestion=commande&action=form_commande');
    }

    public function annuler()
    {
        $this->oModele->annuler();
        header('Location: index.php?gestion=commande&action=form_commande');
    }

    public function listerCommandeAnnuler()
    {
        $listeCommandes = $this->oModele->getListeCommandeAnnuler();
        $this->oVue->genererAffichageListeAnnuler($listeCommandes);
    }
}