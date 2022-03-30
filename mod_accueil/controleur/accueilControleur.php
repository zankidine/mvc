<?php
/**
 * Classe AccueilControleur
 */
class AccueilControleur{

    private $parametre = [];
    private $oModele;
    private $oVue; // Objet

    public function __construct($parametre){

        $this->parametre = $parametre;
        $this->oModele = new AccueilModele($this->parametre);
        $this->oVue = new AccueilVue($this->parametre);
    }

    public function lister(){
        $caGlobal = $this->oModele->getCaGlobal();
        $nbrClient = $this->oModele->getNbrClient();
        $moyenne = $this->oModele->getMoyenneParCommande();
        $listeMeilleurClients = $this->oModele->getMeilleursClient();
        $listeMeilleursProduits = $this->oModele->getMeilleursProduits();
        $this->oVue->genererAffichage($caGlobal, $nbrClient, $moyenne,  $listeMeilleurClients, $listeMeilleursProduits);
    }
}
