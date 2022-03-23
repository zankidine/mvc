<?php

class ProduitVue
{
    private $parametre = [];
    private $tpl; // Objet Smarty

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->tpl = new Smarty();
    }

    public function chargementValeurs()
    {

        $this->tpl->assign('login', $_SESSION['prenomNom']);
        $this->tpl->assign('titreVue', 'GOURMANDISE SARL');
    }

    public function genererAffichageListe($valeurs)
    {
        $this->chargementValeurs();
        $this->tpl->assign('titrePage', 'Liste des Produits');
        $this->tpl->assign('listeProduits', $valeurs);
        $this->tpl->display('mod_produit/vue/produitListeVue.tpl');
    }

    public function genererAffichageFiche($valeurs)
    {
        $this->chargementValeurs();

        switch ($this->parametre['action']) {

            case 'form_consulter':
                $this->tpl->assign('action', 'consulter');
                $this->tpl->assign('titrePage', 'Fiche Produit : Consultation');
                $this->tpl->assign('readonly', 'disabled');
                $this->tpl->assign('unProduit', $valeurs);
                break;

            case 'form_ajouter':
            case 'ajouter':
                $this->tpl->assign('action', 'ajouter');
                $this->tpl->assign('titrePage', 'Fiche Produit : Création');
                $this->tpl->assign('readonly', '');
                $this->tpl->assign('unProduit', $valeurs);
                break;
            case 'form_modifier':
                $this->tpl->assign('action', 'modifier');
                $this->tpl->assign('titrePage', 'Fiche Produit : Modification');
                $this->tpl->assign('readonly', '');
                $this->tpl->assign('unProduit', $valeurs);
                break;
        }

        $this->tpl->display('mod_produit/vue/produitFicheVue.tpl');
    }

    public function genererAffichageListeArchive($valeurs)
    {
        $this->chargementValeurs();
        $this->tpl->assign('titrePage', 'Liste des Archives Produit');
        $this->tpl->assign('listeProduit', $valeurs);
        $this->tpl->display('mod_produit/vue/produitArchiveListeVue.tpl');
    }
}