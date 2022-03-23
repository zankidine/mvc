<?php
class AccueilVue{

    private $parametre = [];
    private $tpl; //Object

    public function __construct($parametre){
        $this->parametre = $parametre;
        $this->tpl = new Smarty();

    }

    public function genererAffichage(){

        $this->tpl->assign('login', $_SESSION['prenomNom']);
        $this->tpl->assign('tabBord', "Ici le contenu");
        $this->tpl->display('mod_accueil/vue/accueilVue.tpl');

    }
}
