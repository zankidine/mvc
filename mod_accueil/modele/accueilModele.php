<?php

class AccueilModele extends Modele {

    private $parametre = [];

    public function __construct($parametre){

        $this->parametre = $parametre;
    }

    public function getCaGlobal()
    {
        $sql = "SELECT SUM(total_ht) 'CAGLOBAL' FROM `commande` WHERE date_commande BETWEEN  '2008-01-01' AND '2008-12-31'";
        $idRequete = $this->executeRequete($sql);

        return $idRequete->fetch(PDO::FETCH_ASSOC);
    }

    public function getNbrClient()
    {
        $sql = "SELECT COUNT(codec) 'NBRCLIENT' FROM client";
        $idRequete = $this->executeRequete($sql);

        return $idRequete->fetch(PDO::FETCH_ASSOC);
    }

    public function getMoyenneParCommande()
    {
        $sql = "SELECT AVG(quantite_demandee) 'Moyenne' FROM ligne_commande";
        $idRequete = $this->executeRequete($sql);

        return $idRequete->fetch(PDO::FETCH_ASSOC);
    }

    public function getMeilleursClient()
    {
        $sql = "SELECT client.nom, SUM(total_ht) 'CACLIENT' 
        FROM client, commande WHERE commande.codec = client.codec GROUP BY client.nom ORDER BY SUM(total_ht) DESC LIMIT 8";

        $idRequete = $this->executeRequete($sql);

        return $idRequete->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getMeilleursProduits()
    {
        $sql = "SELECT produit.designation, COUNT(ligne_commande.reference) 'NbrVente' FROM produit, ligne_commande WHERE produit.reference = ligne_commande.reference GROUP BY  produit.designation ORDER BY COUNT(ligne_commande.reference) DESC LIMIT 8";

        $idRequete = $this->executeRequete($sql);

        return $idRequete->fetchAll(PDO::FETCH_ASSOC);

    }
}