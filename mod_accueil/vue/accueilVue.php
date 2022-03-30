<?php
class AccueilVue{

    private $parametre = [];
    private $tpl; //Object

    public function __construct($parametre){
        $this->parametre = $parametre;
        $this->tpl = new Smarty();

    }

    public function genererAffichage($caGlobal, $nbrClient, $moyenne, $listeMeilleursClient, $listeMeilleursProduits){

        $this->tpl->assign('login', $_SESSION['prenomNom']);
        $this->tpl->assign('tabBord', "Ici le contenu");
        $this->tpl->assign('caGlobal', $caGlobal['CAGLOBAL']);
        $this->tpl->assign('nbrClient', $nbrClient['NBRCLIENT']);
        $this->tpl->assign('moyenne', $moyenne['Moyenne']);
        $this->tpl->assign('listeMeilleursClients', $listeMeilleursClient);
        $this->tpl->assign('listeMeilleursProduits', $listeMeilleursProduits);
        $this->tpl->display('mod_accueil/vue/accueilVue.tpl');

    }
}
