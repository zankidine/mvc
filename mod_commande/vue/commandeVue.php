<?php

class CommandeVue
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
        $this->tpl->assign('titrePage', 'Liste des Commande');
        $this->tpl->assign('listeCommandes', $valeurs);
        $this->tpl->display('mod_commande/vue/commandeListeVue.tpl');
    }

    public function genererAffichageListeNonValidee($valeurs)
    {

        $this->chargementValeurs();
        $this->tpl->assign('titrePage', 'Liste des Commande non validée');
        $this->tpl->assign('listeCommandes', $valeurs);
        $this->tpl->display('mod_commande/vue/commandeNonValideeListeVue.tpl');
    }

    public function genererAffichageFiche($valeurs)
    {
        $this->chargementValeurs();

        switch ($this->parametre['action']) {

            case 'form_consulter':
                $this->tpl->assign('action', 'consulter');
                $this->tpl->assign('selected', 'selected');
                $this->tpl->assign('titrePage', 'Fiche Commande : Consultation');
                $this->tpl->assign('readonly', 'disabled');
                $this->tpl->assign('uneCommande', $valeurs);
                break;
            case 'form_modifier':
                $this->tpl->assign('action', 'modifier');
                $this->tpl->assign('titrePage', 'Fiche Commande : Modification');
                $this->tpl->assign('selected', 'selected');
                $this->tpl->assign('readonly', 'disabled');
//                $this->tpl->assign('readonly', '');
                $this->tpl->assign('uneCommande', $valeurs);
                break;

        }

        $this->tpl->display('mod_commande/vue/commandeFicheVue.tpl');
    }

    public function genererAffichageListeProduitCommande($valeurs, $analyse, $nbrLigne)
    {
        $this->chargementValeurs();
        $this->tpl->assign('action', 'passerCommande');
        $this->tpl->assign('titrePage', 'Fiche Passer Commande : Passer Commande');
        $this->tpl->assign('readonly', 'disabled');
        $this->tpl->assign('listeProduits', $valeurs);
        $this->tpl->assign('analyse', $analyse);
        $this->tpl->assign('nbrLigne', $nbrLigne);
        $this->tpl->display('mod_commande/vue/passerCommande.tpl');
    }

//    public function genererAffichageListeArchive($listeProduit)
//    {
//    }
    public function genererAffichageListeProduitPanier(array $listeDesLignes)
    {
        $this->chargementValeurs();
        var_dump($listeDesLignes);
        //header('location: index.php?gestion=commande&action=form_commande');
    }

    public function genererAffichagePanier($valeurs, $analyse)
    {
        $this->chargementValeurs();
        $this->tpl->assign('listePanier', $valeurs);
        $this->tpl->assign('analyse', $analyse);
        $this->tpl->display('mod_commande/vue/commandePanierVue.tpl');
    }

    public function genererAffichageFicheVide($listeClient,$nomVendeur, $listeLignePanier,$analyse, $vendeur)
    {

        $this->chargementValeurs();
        $this->tpl->assign('action', 'creer');
        $this->tpl->assign('titrePage', 'Fiche Commande : Enregistrement');
        $this->tpl->assign('listeClient', $listeClient);
        $this->tpl->assign('nomVendeur', $nomVendeur);
        $this->tpl->assign('listePanier', $listeLignePanier);
        $this->tpl->assign('analyse', $analyse);
        $this->tpl->assign('vendeur', $vendeur);
        $this->tpl->display('mod_commande/vue/commandeAjouterFicheVue.tpl');
    }

    public function genererAffichageListeAnnuler($valeurs)
    {
        $this->chargementValeurs();
        $this->tpl->assign('titrePage', 'Liste des Commande annuler');
        $this->tpl->assign('listeCommandes', $valeurs);
        $this->tpl->display('mod_commande/vue/commandeAnnulerListeVue.tpl');
    }
}