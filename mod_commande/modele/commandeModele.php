<?php

class CommandeModele extends Modele
{
    private $parametre = [];

    public function __construct($parametre){

        $this->parametre = $parametre;
    }

    public function getListeCommande()
    {
        //$sql = "SELECT * FROM commande ";
        $sql = "SELECT numero, commande.codev,commande.codec, date_livraison, date_commande, total_ht, total_tva, etat, client.nom 'client', vendeur.nom 'vendeur' FROM commande INNER JOIN client ON commande.codec = client.codec INNER JOIN vendeur ON vendeur.codev = commande.codev";

        $idRequete = $this->executeRequete($sql);

        $listeCommandes = [];
        if($idRequete->rowCount() > 0){
            while($row = $idRequete->fetchObject(CommandeTable::class)){

                $listeCommandes[] = $row;

            }
            return $listeCommandes;

        }else{

            return null;
        }
    }

    public function getUneCommande()
    {
        $sql = 'SELECT * FROM commande WHERE numero = ?';
        $idRequete = $this->executeRequete($sql, array($this->parametre['numero']));
        $row = $idRequete->fetch(PDO::FETCH_ASSOC);
        $uneCommande = new CommandeTable($row);
        return $uneCommande;
    }
    public function getUnClient($codec){

        //$sql = 'SELECT * FROM client WHERE codec = ?';
        $sql = 'SELECT client.nom FROM client, commande WHERE commande.codec = ?';
        $idRequete = $this->executeRequete($sql, array($codec));
        return $idRequete->fetch(PDO::FETCH_ASSOC)['nom'];
        //  return new ClientTable($idRequete->fetch(PDO::FETCH_ASSOC));
    }
    public function updateProduit(CommandeTable $controleCommande)
    {
    }

    public function addCommande(CommandeTable $controleCommande)
    {
    }

    public function supprimer()
    {
    }

    public function getListeArchiveCommande()
    {
    }

    public function activer()
    {
    }
}