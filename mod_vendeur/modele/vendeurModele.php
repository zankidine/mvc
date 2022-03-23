<?php

class VendeurModele extends Modele
{
    private $parametre = [];

    public function __construct($parametre){

        $this->parametre = $parametre;
    }

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
        } else {
            echo "Les mots de passe doivent être égale.";
        }
    }

    public function getUnVendeur()
    {
        $sql = 'SELECT * FROM vendeur WHERE login = ?';
        $idRequete = $this->executeRequete($sql, array($_SESSION['login']));
        $row = $idRequete->fetch(PDO::FETCH_ASSOC);
        $unVendeur = new VendeurTable($row);
        return $unVendeur;
    }

    public function caVendeur($unVendeur)
    {
        $sql ="SELECT  SUM(total_ht) 'CA' FROM commande, vendeur WHERE commande.codev = ? " ;
        $idRequete = $this->executeRequete($sql,[$unVendeur->getCodev()]);
        return $idRequete->fetch(PDO::FETCH_ASSOC);
    }


}