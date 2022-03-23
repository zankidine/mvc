<?php

class ProduitModele extends Modele
{
    private $parametre = [];

    public function __construct($parametre){

        $this->parametre = $parametre;
    }
    public function getListeProduit()
    {
        $sql = "SELECT * FROM produit WHERE supprimer = 0";

        $idRequete = $this->executeRequete($sql);

        $listeProduits = [];
        if($idRequete->rowCount() > 0){
            while($row = $idRequete->fetchObject(ProduitTable::class)){

                $listeProduits[] = $row;
            }
            return $listeProduits;

        }else{

            return null;
        }
    }

    public function getListeArchiveProduit()
    {
        $sql = "SELECT * FROM produit WHERE supprimer = 1";

        $idRequete = $this->executeRequete($sql);

        $listeArchiveProduits = [];
        if($idRequete->rowCount() > 0){
            while($row = $idRequete->fetchObject(ProduitTable::class)){

                $listeArchiveProduits[] = $row;
            }
            return $listeArchiveProduits;

        }else{

            return null;
        }
    }

    public function getUnProduit()
    {
        $sql = 'SELECT * FROM produit WHERE reference = ?';
        $idRequete = $this->executeRequete($sql, array($this->parametre['reference']));
        $row = $idRequete->fetch(PDO::FETCH_ASSOC);
        $unProduit = new ProduitTable($row);
        return $unProduit;
    }

    public function addProduit($produit)
    {
        // Requete INSERT et PREPAREE
        $sql = "INSERT INTO produit (designation, quantite, descriptif, prix_unitaire_HT, stock, poids_piece)"
            ." VALUES(?,?,?,?,?,?)";
        $idRequete = $this->executeRequete($sql,[
            $produit->getDesignation(),
            $produit->getQuantite(),
            $produit->getDescriptif(),
            $produit->getPrix_Unitaire_HT(),
            $produit->getStock(),
            $produit->getPoids_Piece(),
        ]);

//        if($idRequete){
//            ClientTable::setMessageSucces("Client correctement enregistré. <br>");
//        }
    }

    public function updateProduit(ProduitTable $produit){
        // Requete INSERT et PREPAREE
        $sql = "UPDATE produit SET designation=?, quantite= ?, descriptif=?, prix_unitaire_HT=?, stock=?, poids_piece=? WHERE reference= ?";

        $idRequete = $this->executeRequete($sql,[
            $produit->getDesignation(),
            $produit->getQuantite(),
            $produit->getDescriptif(),
            $produit->getPrix_Unitaire_HT(),
            $produit->getStock(),
            $produit->getPoids_Piece(),
            $produit->getReference()
        ]);

//        if($idRequete){
//            ClientTable::setMessageSucces("Client correctement modifier. <br>");
//        }
    }

    public function supprimer()
    {
        //$sql = "DELETE FROM  produit WHERE reference= ?";
        $sql = "UPDATE produit SET supprimer = 1 WHERE reference= ?";

        $idRequete = $this->executeRequete($sql, array($this->parametre['reference']));
    }

    public function activer()
    {
        $sql = "UPDATE produit SET supprimer = 0 WHERE reference= ?";

        $idRequete = $this->executeRequete($sql, array($this->parametre['reference']));
    }

    public function delete()
    {
        $sql = "DELETE FROM  produit WHERE reference= ?";

        $idRequete = $this->executeRequete($sql, array($this->parametre['reference']));
    }

    public function positionVente()
    {
        $sql = "SELECT produit.reference, COUNT(ligne_commande.reference) 'Vente' FROM ligne_commande, produit WHERE produit.reference = ligne_commande.reference GROUP BY ligne_commande.reference ORDER BY COUNT(ligne_commande.reference) DESC";

        $idRequete = $this->executeRequete($sql);
        //$idRequete->fetchAll(PDO::FETCH_ASSOC)[0]['Vente'];
//        echo '<pre>';
//            var_dump($idRequete->fetchAll(PDO::FETCH_ASSOC));
//        echo "</pre>";

    }
}