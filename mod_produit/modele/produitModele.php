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

        if($idRequete){
            ProduitTable::setMessageSucces("Produit correctement enregistrer. <br>");
        } else {
            ProduitTable::setMessageErreur("Le produit n'a pas été enregistrer");
        }
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

        if($idRequete){
            ProduitTable::setMessageSucces("Produit correctement modifier. <br>");
        } else {
            ProduitTable::setMessageErreur("Le produit n'a pas été modifier. <br>");
        }
    }

    public function supprimer()
    {
        //$sql = "DELETE FROM  produit WHERE reference= ?";
        $sql = "UPDATE produit SET supprimer = 1 WHERE reference= ?";

        $idRequete = $this->executeRequete($sql, array($this->parametre['reference']));
        if($idRequete){
            ProduitTable::setMessageSucces("Produit correctement supprimer. <br>");
        } else {
            ProduitTable::setMessageErreur("Le produit n'a pas été supprimer. <br>");
        }
    }

    public function activer()
    {
        $sql = "UPDATE produit SET supprimer = 0 WHERE reference= ?";

        $idRequete = $this->executeRequete($sql, array($this->parametre['reference']));
        if($idRequete){
            ProduitTable::setMessageSucces("Produit correctement activer. <br>");
        } else {
            ProduitTable::setMessageErreur("Le produit n'a pas été activer. <br>");
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM  produit WHERE reference= ?";

        $idRequete = $this->executeRequete($sql, array($this->parametre['reference']));
    }

    public function positionVente()
    {
        // Tableau des produits [référence -> nbrVente] trié par DESC
        $sql = "SELECT produit.reference, COUNT(ligne_commande.reference) 'NbrVente' FROM produit 
                LEFT JOIN ligne_commande ON produit.reference = ligne_commande.reference 
                GROUP BY produit.reference ORDER BY COUNT(ligne_commande.reference) DESC";
        $idRequete = $this->executeRequete($sql);
        // Initialiser la position à 1
        $position = 1;
        $reference  = $this->parametre['reference'];
        // Parcourir le tableau à la recherche de la référence recherché
        //var_dump($idRequete->fetch(PDO::FETCH_ASSOC)['NbrVente']);
        while ($row = $idRequete->fetch(PDO::FETCH_ASSOC))
        {

            if ($position > 1)
            {
                if ($row['NbrVente'] ===  $nbrVentePrecedent)
                {
                    $position--;
                }
            }

            //Si référence = référence recherché retourn la position
            if ($row['reference'] === $reference)
            {
                return $position;
                exit();
            }

            $nbrVentePrecedent = $row['NbrVente'];
            $position++;
        }

        // Si référence = référence recherché retourn la position
        // Si référence != référence recherché on stock la valeur pour comparaison avec référence recherché

    }
}