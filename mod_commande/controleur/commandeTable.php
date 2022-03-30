<?php

class CommandeTable
{
    private $numero;
    private $codev;
    private $codec;
    private $date_livraison;
    private $date_commande;
    private $total_ht;
    private $total_tva;
    private $vendeur;
    private $client;
    private $finaliser;
    private $listeLigneCommande = [];
    private $quantitePanier;
    private $annuler;
    private static $messageErreur = "";
    private static $messageSucces = "";

    /**
     * @return mixed
     */
    public function getAnnuler()
    {
        return $this->annuler;
    }

    /**
     * @param mixed $annuler
     */
    public function setAnnuler($annuler): void
    {
        $this->annuler = $annuler;
    }


    /**
     * @return string
     */
    public static function getMessageErreur()
    {
        return self::$messageErreur;
    }

    /**
     * @param string $messageErreur
     */
    public static function setMessageErreur($messageErreur)
    {
        self::$messageErreur = self::$messageErreur . $messageErreur;
    }

    /**
     * @return string
     */
    public static function getMessageSucces()
    {
        return self::$messageSucces;
    }

    /**
     * @param string $messageSucces
     */
    public static function setMessageSucces($messageSucces)
    {
        self::$messageSucces = self::$messageSucces . $messageSucces;
    }

    /**
     * @return mixed
     */
    public function getQuantitePanier()
    {
        return $this->quantitePanier;
    }

    /**
     * @param mixed $quantitePanier
     */
    public function setQuantitePanier($quantitePanier)
    {
        $this->quantitePanier = $quantitePanier;
    }

    /**
     * @return mixed
     */
    public function getFinaliser()
    {
        return $this->finaliser;
    }

    /**
     * @param mixed $finaliser
     */
    public function setFinaliser($finaliser)
    {
        $this->finaliser = $finaliser;
    }


    /**
     * @return array
     */
    public function getListeLigneCommande()
    {
        return $this->listeLigneCommande;
    }

    /**
     * @param array $listeLigneCommande
     */
    public function setListeLigneCommande($listeLigneCommande)
    {
        $this->listeLigneCommande = $listeLigneCommande;
    }

    /**
     * @return mixed
     */
    public function getVendeur()
    {
        return $this->vendeur;
    }

    /**
     * @param mixed $vendeur
     */
    public function setVendeur($vendeur): void
    {
        $this->vendeur = $vendeur;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client): void
    {
        $this->client = $client;
    }
    private $etat;

    //2- "Importer" la méthode hydrater
    /**
     * Chargement des propriétés de l'objet
     * à partir d'un tableau associatif en provenance
     * d'une base de données
     * ou d'un formulaire (saisie utilisateur)
     * $row <- $data;
     */
    public function hydrater(array $row)
    {
        foreach($row as $cle => $valeur){
            $setter = 'set'.ucfirst($cle);
            if(method_exists($this,$setter)){
                $this->$setter($valeur);
            }
        }
    }
    public function __construct($data = null)
    {
        if($data != null){
            $this->hydrater($data);
        }
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getCodev()
    {
        return $this->codev;
    }

    /**
     * @param mixed $codev
     */
    public function setCodev($codev)
    {
        $this->codev = $codev;
    }

    /**
     * @return mixed
     */
    public function getCodec()
    {
        return $this->codec;
    }

    /**
     * @param mixed $codec
     */
    public function setCodec($codec)
    {
        $this->codec = $codec;
    }

    /**
     * @return mixed
     */
    public function getDate_Livraison()
    {
        return $this->date_livraison;
    }

    /**
     * @param mixed $date_livraison
     */
    public function setDate_Livraison($date_livraison)
    {
        $this->date_livraison = $date_livraison;
    }

    /**
     * @return mixed
     */
    public function getDate_Commande()
    {
        return $this->date_commande;
    }

    /**
     * @param mixed $date_commande
     */
    public function setDate_Commande($date_commande)
    {
        $this->date_commande = $date_commande;
    }

    /**
     * @return mixed
     */
    public function getTotal_Ht()
    {
        return $this->total_ht;
    }

    /**
     * @param mixed $tota_ht
     */
    public function setTotal_Ht($total_ht)
    {
        $this->total_ht = $total_ht;
    }

    /**
     * @return mixed
     */
    public function getTotal_Tva()
    {
        return $this->total_tva;
    }

    /**
     * @param mixed $total_tva
     */
    public function setTotal_Tva($total_tva)
    {
        $this->total_tva = $total_tva;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    public function getAutorisationBD()
    {
    }


}