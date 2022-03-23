<?php

class AuthentificationTable
{
    //
    private $login = "";
    private $motdepasse = "";
    private $autorisationSession = true;
    private static $messageErreur = "";



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
     * @return string
     */
    public function getLogin()
    {

        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        if (empty($login)  || ctype_space($login)) {
            $this->setAutorisationSession(false);
            self::setMessageErreur("Vous devez saisir un login.");
        }
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * @param string $motdepasse
     */
    public function setMotdepasse( $motdepasse)
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
            $this->setAutorisationSession(false);
            self::setMessageErreur("Vous devez saisir un mot de passe.");
            $this->motdepasse = "";
        }
        //$this->motdepasse = $motdepasse;
    }

    /**
     * @return bool
     */
    public function getAutorisationSession()
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
     * @return mixed
     */
    public static function getMessageErreur()
    {
        return self::$messageErreur;
    }

    /**
     * @param mixed $messageErreur
     */
    public static function setMessageErreur($messageErreur): void
    {
        self::$messageErreur = self::$messageErreur . " " . $messageErreur;
    }


}