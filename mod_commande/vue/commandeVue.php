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

    public function genererAffichageFiche($uneCommande)
    {
    }

    public function genererAffichageListeArchive($listeProduit)
    {
    }
}