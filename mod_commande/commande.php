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
                case 'form_commande':
                    $this->oControleur->form_commande();
                    break;

                case 'form_modifier':
                    $this->oControleur->form_modifier();
                    break;
                case 'modifier':
                    $this->oControleur->modifier();
                    break;
                case 'finaliser':
                    $this->oControleur->finaliser();
                    break;
                case 'annuler':
                    $this->oControleur->annuler();
                    break;
                case 'modifier_date':
                    $this->oControleur->modifierDateLivraison();
                    break;
                case 'modifier_ligne':
                    $this->oControleur->modifierLigneCommande();
                    break;
                case 'nonValidee':
                    $this->oControleur->listerCommandeNonValidee();
                    break;
                case 'commande_annuler':
                    $this->oControleur->listerCommandeAnnuler();
                    break;
                case 'panier':
                    $this->oControleur->voirPanier();
                    break;
                case 'modifierLigne':
                    $this->oControleur->modifierLigne();
                    break;
                case 'supprimerLigne':
                    $this->oControleur->supprimerLigne();
                    break;
                case 'ajouter_panier':
                    $this->oControleur->ajouterPanier();
                    break;
                case 'vider_panier':
                    $this->oControleur->viderPanier();
                    break;
                case 'form_ajouter':
                    $this->oControleur->sauvegarder();
                    break;
                case 'valider_commande':
                    $this->oControleur->valider();
                    break;
            }

        } else {

            $this->oControleur->lister();
            //
        }
    }
}