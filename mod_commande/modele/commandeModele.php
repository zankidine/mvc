<?php

class CommandeModele extends Modele
{
    private $parametre = [];

    public function __construct($parametre){

        $this->parametre = $parametre;
    }

    /**
     * Fonction qui retourne la liste des commandes
     * @return array|null
     */
    public function getListeCommande()
    {
        //$sql = "SELECT * FROM commande ";
        $sql = "SELECT numero, commande.codev,commande.codec, date_livraison, date_commande, total_ht, total_tva, etat, client.nom 'client', vendeur.nom 'vendeur', finaliser, annuler FROM commande INNER JOIN client ON commande.codec = client.codec INNER JOIN vendeur ON vendeur.codev = commande.codev";

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

    /**
     * Fonction qui retourne la liste des commandes supprimer (suppression logique)
     * @return array|null
     */
    public function getListeCommandeNonValidee()
    {
        //$sql = "SELECT * FROM commande ";
        $sql = "SELECT numero, commande.codev,commande.codec, date_livraison, date_commande, total_ht, total_tva, etat, client.nom 'client', vendeur.nom 'vendeur', finaliser FROM commande INNER JOIN client ON commande.codec = client.codec INNER JOIN vendeur ON vendeur.codev = commande.codev WHERE  finaliser = 0 AND annuler = 0";

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

    /**
     * Fonction qui retourne les lignes d'une commande
     * @return mixed
     */
    public function getLignesCommande()
    {
        $sql = "SELECT numero_ligne,ligne_commande.reference, designation,prix_unitaire_HT, quantite_demandee 
                FROM ligne_commande INNER JOIN produit ON produit.reference = ligne_commande.reference 
                WHERE numero = ?";
        $idRequete = $this->executeRequete($sql, array($this->parametre['numero']));
        return $idRequete->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fonction qui retourne un objet Commande
     * @return CommandeTable
     */
    public function getUneCommande()
    {
        $sql = 'SELECT * FROM commande WHERE numero = ?';
        $idRequete = $this->executeRequete($sql, array($this->parametre['numero']));
        $row = $idRequete->fetch(PDO::FETCH_ASSOC);
        $uneCommande = new CommandeTable($row);
        return $uneCommande;
    }

    /**
     * Mini fonction qui retourne juste le nom d'un client grâce à son identifiant
     * @param $codec
     * @return mixed
     */
    public function getUnClient($codec){

        //$sql = 'SELECT * FROM client WHERE codec = ?';
        $sql = 'SELECT client.nom FROM client, commande WHERE commande.codec = ?';
        $idRequete = $this->executeRequete($sql, array($codec));
        return $idRequete->fetch(PDO::FETCH_ASSOC)['nom'];
        //  return new ClientTable($idRequete->fetch(PDO::FETCH_ASSOC));
    }

    /**
     * Fonction qui retourne un tableau des produits non supprimer
     * @return array|null
     */
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


    /**
     * Procéduire pour la finalisation d'une commande
     * @return void
     */
    public function finaliser()
    {
        // Finaliser la commande grâce au numéro de la commande
        $sql = 'UPDATE commande SET finaliser = 1 WHERE numero = ?';
        $idRequete = $this->executeRequete($sql, array($this->parametre['f_numero']));
        if($idRequete){
            CommandeTable::setMessageSucces("La finalisation correctement accepter. <br>");
        } else {
            CommandeTable::setMessageErreur("La finalisation n'a pas été accepter. <br>");
        }
    }

    /**
     * Proceduire pour la modification de la date de livraison
     * @return void
     */
    public function modifierDateLivraison()
    {
        $sql = 'UPDATE commande SET date_livraison = ? WHERE numero = ?';
        $idRequete = $this->executeRequete($sql, array($this->parametre['date_livraison'],$this->parametre['numero']));
        if($idRequete){
            CommandeTable::setMessageSucces("La date de livraison correctement modifier. <br>");
        } else {
            CommandeTable::setMessageErreur("La date de livraison n'a pas été modifier. <br>");
        }
    }

    /**
     * Procéduire pour modifier la ligne de commande + modification du stock
     * @return bool|void
     */
    public function modifierLigneCommande()
    {
        // Modifier la ligne + modifier le stock
        $sql = 'UPDATE ligne_commande, produit SET quantite_demandee = ?, produit.stock = produit.stock - ? WHERE numero = ? AND numero_ligne = ? AND produit.reference = ?';
        $idRequete = $this->executeRequete($sql, array($this->parametre['quantite'],$this->parametre['quantite'],$this->parametre['numero_commande'],$this->parametre['numero_ligne'],$this->parametre['reference_produit']));
        if($idRequete){
            CommandeTable::setMessageSucces("La ligne correctement modifier. <br>");
        } else {
            CommandeTable::setMessageErreur("La ligne n'a pas été modifier. <br>");
        }
    }

    /**
     * Fonction interne pour vérifié si une ligne de commande existe déjà
     * @param $reference
     * @return bool
     */
    protected function ligneExiste($reference)
    {
        $sql = "SELECT reference FROM ligne_panier";
        $idRequete = $this->executeRequete($sql);

        $listeReference = $idRequete->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listeReference as $key => $value)
        {

            if ($value['reference'] == $reference)
            {
                return true;
            }
        }

        return false;

    }

    /**
     * Procéduire pour l'ajout d'une ligne dans le panier ou modification de la quantité
     * @return void
     */
    public function addLigne()
    {
        if ( $this->parametre['quantite'] == '')  $this->parametre['quantite'] = 1;
        // Si référence existe modifie la quantite
        if ($this->ligneExiste($this->parametre['reference']) == true)
        {
            $sql = "UPDATE ligne_panier SET quantite = quantite + ? WHERE reference = ?";
            $idRequete = $this->executeRequete($sql, [$this->parametre['quantite'],  $this->parametre['reference']]);
            if($idRequete){
                CommandeTable::setMessageSucces("La quantité correctement modifier. <br>");
            } else {
                CommandeTable::setMessageErreur("La quantité n'a pas été modifier. <br>");
            }
        } else {
            $sql = "INSERT INTO ligne_panier VALUE (?,?,?)";

            $idRequete = $this->executeRequete($sql, [$this->parametre['reference'], $this->parametre['quantite'], $this->parametre['prixVente']]);
            if($idRequete){
                CommandeTable::setMessageSucces("Ligne correctement ajouter. <br>");
            } else {
                CommandeTable::setMessageErreur("La ligne n'a pas été ajouter. <br>");
            }
        }
    }

    /**
     * Fonction qui retourne la liste des produits dans le panier
     * @return mixed
     */
    public function listePanier()
    {
        $sql = "SELECT ligne_panier.reference, produit.designation, ligne_panier.quantite, produit.prix_unitaire_HT, 
                ligne_panier.prixVente FROM ligne_panier LEFT JOIN produit ON produit.reference = ligne_panier.reference";

        $idRequete = $this->executeRequete($sql);

        return $idRequete->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Procéduire pour la mise à jour d'une ligne dans le panier
     * @return void
     */
    public function updateLigne()
    {
        if ($this->parametre['quantite'] == '' || $this->parametre['quantite'] == 0)
        {
            $this->deleteLigne();
        } else {
            $sql = "UPDATE ligne_panier SET quantite =  ?, prixVente = ? WHERE reference = ?";
            $idRequete = $this->executeRequete($sql, [$this->parametre['quantite'],$this->parametre['prixVente'],  $this->parametre['reference']]);
            if($idRequete){
                CommandeTable::setMessageSucces("Ligne correctement modifier. <br>");
            } else {
                CommandeTable::setMessageErreur("La ligne n'a pas été modifier. <br>");
            }
        }

    }

    /**
     * Procéduire pour supprimer une ligne dans le panier selon sa référence
     * @return void
     */
    public function deleteLigne()
    {
        $sql = "DELETE FROM ligne_panier WHERE reference = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['reference']]);
        if($idRequete){
            CommandeTable::setMessageSucces("Ligne correctement supprimer. <br>");
        } else {
            CommandeTable::setMessageErreur("La ligne n'a pas été supprimer. <br>");
        }
    }

    /**
     * Fonction qui retourne le TOTAL du panier + TVA + Marge Brute
     * @return mixed
     */
    public function MontantTvaEtMarge()
    {
        $sql = "SELECT SUM(ligne_panier.quantite*prixVente) 'Montant', SUM((prixVente * 1.20) - prixVente) 'TVA', 
            SUM(prixVente - produit.prix_unitaire_HT) 'Marge' FROM ligne_panier, produit 
            WHERE produit.reference = ligne_panier.reference";
        $idRequete = $this->executeRequete($sql);

        return $idRequete->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Produire pour vider le panier
     * @return void
     */
    public function viderPanier()
    {
        $sql = "DELETE FROM ligne_panier";
        $idRequete = $this->executeRequete($sql);
    }

    /**
     * Fonction qui retourne un objet client
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
     * Fonction qui retourne la liste des clients actif
     * @return array|null
     */
    public function listeClient()
    {

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

    /**
     * Procédure pour la création d'une nouvelle commande avec mise en liaison commande + ligne commande
     * @return void
     */
    public function newCommande()
    {
        // Création d'une nouvelle commande
        $sql = "INSERT INTO commande (codev , codec , date_livraison , date_commande , total_ht , total_tva , etat, finaliser) VALUES (?,?,?,?,?,?,?,?)";
        $i = 0;
        try {
            $idRequete = $this->executeRequete($sql, [
                intval($this->parametre['vendeur']),
                intval($this->parametre['client']),
                $this->parametre['date_livraison'],
                $this->parametre['date_commande'],
                floatval($this->parametre['montant']),
                floatval($this->parametre['tva']),
                1,
                0,
            ]);

            // Retourne la dernière référence commande
            // Pour pouvoir le lier avec des lignes commande
            $numero = $this->dernierID();
            if ($idRequete)
            {
                //var_dump($this->dernierID());
                while ($i <= count($this->listePanier()) - 1)
                {
                    // Ajouter les lignes commandes
                    $sql = "INSERT INTO ligne_commande (numero, numero_ligne, reference, quantite_demandee) VALUES (?,?,?,?)";
                    $idRequete = $this->executeRequete($sql, [
                        $numero,
                        $i + 1,
                        $this->listePanier()[$i]['reference'],
                        $this->listePanier()[$i]['quantite'],
                    ]);

                    $i = $i + 1;
                }
                if($idRequete){
                    CommandeTable::setMessageSucces("Commande correctement créer. <br>");
                }
                // Vider le panier
                $this->viderPanier();

            }

        } catch (PDOException $e)
        {

        }

    }

    public function annuler()
    {
        $sql = "UPDATE commande SET  annuler = 1 WHERE numero = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['f_numero']]);
        if($idRequete){
            CommandeTable::setMessageSucces("Commande annuler avec succès. <br>");
        }
    }

    public function getListeCommandeAnnuler()
    {
        //$sql = "SELECT * FROM commande ";
        $sql = "SELECT numero, commande.codev,commande.codec, date_livraison, date_commande, total_ht, total_tva, etat, client.nom 'client', vendeur.nom 'vendeur', finaliser, annuler FROM commande INNER JOIN client ON commande.codec = client.codec INNER JOIN vendeur ON vendeur.codev = commande.codev WHERE  finaliser = 0 AND annuler = 1";

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
}