<?php

class VendeurVue
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

    public function genererAffichageFiche($valeurs)
    {
        $this->chargementValeurs();
        $this->tpl->assign('titrePage', 'Profil vendeur');
        $this->tpl->assign('unVendeur', $valeurs);
        $this->tpl->display('mod_vendeur/vue/vendeurFicheVue.tpl');
    }

//    public function genererAffichageFiche($valeurs)
//    {
//        $this->chargementValeurs();
//
////        switch ($this->parametre['action']) {
////
////            case 'form_consulter':
////                $this->tpl->assign('action', 'consulter');
////                $this->tpl->assign('titrePage', 'Fiche Vendeur : Consultation');
////                $this->tpl->assign('readonly', 'disabled');
////                $this->tpl->assign('unVendeur', $valeurs);
////                break;
////
//////            case 'form_modifier':
//////                $this->tpl->assign('action', 'modifier');
//////                $this->tpl->assign('titrePage', 'Fiche Vendeur : Modification');
//////                $this->tpl->assign('readonly', '');
//////                $this->tpl->assign('unVendeur', $valeurs);
//////                break;
////        }
//
//
//        $this->tpl->display('mod_vendeur/vue/vendeurFicheVue.tpl');
//    }

}