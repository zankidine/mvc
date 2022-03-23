<?php

/**
 * Classe ClientControleur
 */
class ClientControleur
{

    private $parametre = [];
    private $oModele; //Objet
    private $oVue; // Objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;
        $this->oModele = new ClientModele($this->parametre);
        $this->oVue = new ClientVue($this->parametre);
    }

    public function lister()
    {

        $listeClients = $this->oModele->getListeClients();

        $this->oVue->genererAffichageListe($listeClients);
    }

    public function listerArchive()
    {

        $listeClients = $this->oModele->getListeArchiveClients();

        $this->oVue->genererAffichageListeArchive($listeClients);
    }


    public function form_consulter()
    {

        $unClient = $this->oModele->getUnClient();
        $part = (floatval($unClient->getCaClient())/floatval($this->oModele->chiffreAffaireTotal()["TOTAL"]))*100;
        $unClient->setListeMeilleurAchat($this->oModele->listeMeilleurAchat());
        $unClient->setPart(round($part, 2));

        $this->oVue->genererAffichageFiche($unClient);
    }

    public function form_ajouter()
    {
        $prepareClient = new ClientTable();

        $this->oVue->genererAffichageFiche($prepareClient);
    }

    public function ajouter(){
        /*Algo
         * Controler les données récupérées du formulaire
         *
         * SI les données sont validées Alors
         * enregistrement en BR
         * et retour sur la liste avec un message de succès
         * Sinon
         * Redirige vers le formulaire en création (ajouter)
         * avec les valeurs précédemment saisies
         */

        // Controler les données
        $controleClient = new ClientTable($this->parametre);

        if($controleClient->getAutorisationBD() == true){

            $this->oModele->addClient($controleClient);

            $this->lister();

        }else{

            $this->oVue->genererAffichageFiche($controleClient);

        }

    }

    public function modifier()
    {
        $controleClient = new ClientTable($this->parametre);

        if($controleClient->getAutorisationBD() == true){

            $this->oModele->updateClient($controleClient);

            $this->lister();

        }else{

            $this->oVue->genererAffichageFiche($controleClient);

        }
    }

    public function supprimer()
    {
//        var_dump($this->oModele->getUnClient()->getCodec());
        $this->oModele->supprimer();
        header('Location: index.php?gestion=client');
    }

    public function activerArchive()
    {
//        var_dump($this->oModele->getUnClient()->getCodec());
        $this->oModele->activer();
        header('Location: index.php?gestion=client');
    }

//    public function caClient()
//    {
//        $this->oModele->chiffreAffaire();
//    }
    public function form_modifier()
    {
        $unClient = $this->oModele->getUnClient();
        $part = (floatval($unClient->getCaClient())/floatval($this->oModele->chiffreAffaireTotal()["TOTAL"]))*100;
        $unClient->setListeMeilleurAchat($this->oModele->listeMeilleurAchat());
        $unClient->setPart(round($part, 2));

        $this->oVue->genererAffichageFiche($unClient);
    }
}

