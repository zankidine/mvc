<?php

class ClientTable
{
    // 1- Déclarer les propriétés de l'entité Client
    private $codec = "";
    private $nom = "";
    private $adresse = "";
    private $cp = "";
    private $ville = "";
    private $telephone = "";
    private $supprimer = "";
    private $caClient = 0;
    private $part;
    private $listeMeilleurAchat = [];

    /**
     *
     */
    public function getListeMeilleurAchat()
    {
        return $this->listeMeilleurAchat;
    }

    /**
     * @param  $listeMeilleurAchat
     */
    public function setListeMeilleurAchat($listeMeilleurAchat)
    {
        $this->listeMeilleurAchat = $listeMeilleurAchat;
    }

    /**
     *
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param $part
     */
    public function setPart($part)
    {
        $this->part = $part;
    }

    /**
     * @return int
     */
    public function getCaClient()
    {
        return $this->caClient;
    }

    /**
     * @param  $caClient
     */
    public function setCaClient($caClient)
    {
        $this->caClient = $caClient;
    }

    private $autorisationBD = true;

    private static $messageErreur = "";
    private static $messageSucces = "";

    /**
     * @return string
     */
    public function getSupprimer()
    {
        return $this->supprimer;
    }

    /**
     * @param string $supprimer
     */
    public function setSupprimer($supprimer)
    {
        $this->supprimer = $supprimer;
    }

    /**
     * @return bool
     */
    public function getAutorisationBD()
    {
        return $this->autorisationBD;
    }

    /**
     * @param bool $autorisationBD
     */
    public function setAutorisationBD($autorisationBD)
    {
        $this->autorisationBD = $autorisationBD;
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


    //3- Générer les getters et les setters

    /**
     * @return string
     */
    public function getCodec()
    {
        return $this->codec;
    }

    /**
     * @param string $codec
     */
    public function setCodec($codec)
    {
        $this->codec = $codec;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        if(empty($nom) || ctype_space($nom)){
            $this->setAutorisationBD(false);
            self::setMessageErreur("La rubrique nom est obligatoire.<br>");
        }
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getCp()
    {

        return $this->cp;
    }

    /**
     * @param string $cp
     */
    public function setCp($cp)
    {
        if(empty($cp) || ctype_space($cp)){
            $this->setAutorisationBD(false);
            self::setMessageErreur("Le code postal est obligatoire.<br>");
        }
        $this->cp = $cp;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        if(empty($ville) || ctype_space($ville)){
            $this->setAutorisationBD(false);
            self::setMessageErreur("La rubrique ville est obligatoire.<br>");
        }

        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

}
