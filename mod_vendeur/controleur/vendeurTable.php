<?php

class VendeurTable extends AuthentificationTable
{
    private $codev;
    private $prenom;
    private $nom;
    private $adresse;
    private $cp;
    private $ville;
    private $telephone;
    private $login;
    private $motdepasse;
    private $autorisationBD = true;
    private $cavendeur;

    /**
     * @return bool
     */
    public function auutorisationSession(): bool
    {
        return $this->autorisationSession;
    }

    /**
     * @param bool $autorisationSession
     */
    public function setAutorisationSession($autorisationSession)
    {
        $this->autorisationSession = $autorisationSession;
    }

    /**
     * @return string
     */
//    public static function getMessageErreur(): string
//    {
//        return self::$messageErreur;
//    }
//
//    /**
//     * @param string $messageErreur
//     */
//    public static function setMessageErreur($messageErreur)
//    {
//        self::$messageErreur = $messageErreur;
//    }

    /**
     * @return mixed
     */
    public function getCavendeur()
    {
        return $this->cavendeur;
    }

    /**
     * @param mixed $cavendeur
     */
    public function setCavendeur($cavendeur): void
    {
        $this->cavendeur = $cavendeur;
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
    public function setCodev($codev): void
    {
        $this->codev = $codev;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp): void
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * @param mixed $motdepasse
     */
    public function setMotdepasse($motdepasse): void
    {
        if (!ctype_space($motdepasse) && !empty($motdepasse))
        {
            // Chiifrage de mot de passe pour controle à la base de données
            //Mot de passe sowhat
            $gauche = "ar30&y%";
            $droite = "tk!@";
            $this->motdepasse = hash('ripemd128',"$gauche$motdepasse$droite");
        } else
        {
            //self::setMessageErreur("Vous devez saisir un mot de passe.");
            $this->motdepasse = "";
        }
        //$this->motdepasse = $motdepasse;
    }

    /**
     * @return bool
     */
    public function getAutorisationBD(): bool
    {
        return $this->autorisationBD;
    }

    /**
     * @param bool $autorisationBD
     */
    public function setAutorisationBD(bool $autorisationBD): void
    {
        $this->autorisationBD = $autorisationBD;
    }



}