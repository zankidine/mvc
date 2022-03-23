<?php

class ClientModele extends Modele{

    private $parametre = [];

    public function __construct($parametre){

        $this->parametre = $parametre;
    }

    public function getListeClients(){

        $sql = "SELECT * FROM client WHERE supprimer = 0";

        $idRequete = $this->executeRequete($sql);

        if($idRequete->rowCount() > 0){

            while($row = $idRequete->fetch(PDO::FETCH_ASSOC)){

                $listeClients[] = new ClientTable($row);
            }
            return $listeClients;

        }else{

            return null;
        }

    }
    public function getListeArchiveClients(){

        $sql = "SELECT * FROM client WHERE supprimer = 1";

        $idRequete = $this->executeRequete($sql);

        if($idRequete->rowCount() > 0){

            while($row = $idRequete->fetch(PDO::FETCH_ASSOC)){

                $listeClients[] = new ClientTable($row);
            }
            return $listeClients;

        }else{

            return null;
        }

    }

    public function getUnClient(){

        //$sql = 'SELECT * FROM client WHERE codec = ?';
        $sql = 'SELECT client.codec,client.nom, client.adresse, client.cp, client.ville, client.telephone, SUM(total_ht) "caClient" FROM client, commande WHERE client.codec = ? AND commande.codec = ?';
        $idRequete = $this->executeRequete($sql, array($this->parametre['codec'],$this->parametre['codec']));
        $row = $idRequete->fetch(PDO::FETCH_ASSOC);
        $unClient = new ClientTable($row);
        return $unClient;
        //  return new ClientTable($idRequete->fetch(PDO::FETCH_ASSOC));
    }

    public function addClient(ClientTable $client){
        // Requete INSERT et PREPAREE
        $sql = "INSERT INTO client (nom, adresse, cp, ville, telephone)"
            ." VALUES(?,?,?,?,?)";
        var_dump($client);
        $idRequete = $this->executeRequete($sql,[
            $client->getNom(),
            $client->getAdresse(),
            $client->getCp(),
            $client->getVille(),
            $client->getTelephone(),
        ]);

        if($idRequete){
            ClientTable::setMessageSucces("Client correctement enregistré. <br>");
        }
    }

    public function updateClient(ClientTable $client){
        // Requete INSERT et PREPAREE
        $sql = "UPDATE client SET nom=?, adresse= ?, cp=?, ville=?, telephone=? WHERE codec= ?";

        $idRequete = $this->executeRequete($sql,[
            $client->getNom(),
            $client->getAdresse(),
            $client->getCp(),
            $client->getVille(),
            $client->getTelephone(),
            $client->getCodec(),
        ]);

        if($idRequete){
            ClientTable::setMessageSucces("Client correctement modifier. <br>");
        }
    }

    public function supprimer()
    {
        $sql = "UPDATE client SET supprimer = 1 WHERE codec= ?";

        $idRequete = $this->executeRequete($sql, array($this->parametre['codec']));


    }

    public function activer()
    {
        $sql = "UPDATE client SET supprimer = 0 WHERE codec= ?";

        $idRequete = $this->executeRequete($sql, array($this->parametre['codec']));
    }

    public function chiffreAffaireTotal()
    {
        $sql = 'SELECT SUM(total_ht) "TOTAL" FROM commande';
        $idRequete = $this->executeRequete($sql, array($this->parametre['codec']));
        $row = $idRequete->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function listeMeilleurAchat()
    {
        $sql = 'SELECT * FROM (
        SELECT ligne_commande.reference,SUM(ligne_commande.quantite_demandee) "Qantite" FROM ligne_commande WHERE ligne_commande.numero 
        IN(SELECT commande.numero FROM commande WHERE commande.codec = ?) GROUP BY ligne_commande.reference 
        ORDER BY SUM(ligne_commande.quantite_demandee) DESC LIMIT 5) as t NATURAL JOIN (
            SELECT reference, designation FROM produit WHERE produit.reference IN(
            SELECT ligne_commande.reference FROM ligne_commande WHERE ligne_commande.numero IN(
            SELECT commande.numero FROM commande WHERE commande.codec = ?) GROUP BY ligne_commande.reference 
        ORDER BY SUM(ligne_commande.quantite_demandee) DESC)) AS y';

        $idRequete = $this->executeRequete($sql, array($this->parametre['codec'],$this->parametre['codec']));
        $row = $idRequete->fetchAll(PDO::FETCH_ASSOC);
        $listeProduits = [];
        $i = 0;
        while($i <= count($row) - 1)
        {
            $listeProduits['produit'][] = [
                $row[$i]['designation']=>$row[$i]['Qantite']
            ];

            $i = $i + 1;

        }
        return $listeProduits;
    }

    public function delete()
    {
        $sql = "DELETE FROM  client WHERE codec= ?";

        $idRequete = $this->executeRequete($sql, array($this->parametre['reference']));
    }

}
