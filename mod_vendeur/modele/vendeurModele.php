<?php

class VendeurModele extends Modele
{
    private $parametre = [];

    public function __construct($parametre){

        $this->parametre = $parametre;
    }

    /**
     * Procédure pour la modification des informations vendeur
     * @param VendeurTable $Vendeur
     * @return void
     */
    public function updateVendeur(VendeurTable $Vendeur)
    {

        $motdepasse = $this->parametre['motdepasse'];
        $confirmationmotdepasse =$this->parametre['confirmationmotdepasse'];

        if ($motdepasse === $confirmationmotdepasse){
           // Transformation de mot de passe
            $Vendeur->setMotdepasse($motdepasse);
            // Requete INSERT et PREPAREE
            $sql = "UPDATE vendeur SET adresse= ?, cp=?, ville=?, telephone=?, motdepasse=? WHERE codev= ?";

            $idRequete = $this->executeRequete($sql,[
                $Vendeur->getAdresse(),
                $Vendeur->getCp(),
                $Vendeur->getVille(),
                $Vendeur->getTelephone(),
                $Vendeur->getMotdepasse(),
                $Vendeur->getCodev(),
            ]);
            if($idRequete){
                VendeurTable::setMessageSucces("Les modifications sont bien prises en compte. <br>");
            }
        } else {
            VendeurTable::setMessageErreur("Les mots de passe doivent être égale. <br>");

        }
    }

    /**
     * Fonction qui retourne un objet Vendeur
     * @return VendeurTable
     */
    public function getUnVendeur()
    {
        $sql = 'SELECT * FROM vendeur WHERE login = ?';
        $idRequete = $this->executeRequete($sql, array($_SESSION['login']));
        $row = $idRequete->fetch(PDO::FETCH_ASSOC);
        $unVendeur = new VendeurTable($row);
        return $unVendeur;
    }

    /**
     * Fonction qui retourne le chiffre d'affaire d'un vendeur (moins les commandes annulées)
     * @param $unVendeur
     * @return mixed
     */
    public function caVendeur($unVendeur)
    {
        $sql ="SELECT  SUM(total_ht) 'CA' FROM commande, vendeur WHERE commande.codev = ? AND commande.annuler = 0 " ;
        $idRequete = $this->executeRequete($sql,[$unVendeur->getCodev()]);
        return $idRequete->fetch(PDO::FETCH_ASSOC);
    }


}