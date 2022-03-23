<?php

class ProduitTable
{
    private $reference;
    private $designation;
    private $quantite;
    private $descriptif;
    private $prix_unitaire_HT;
    private $stock;
    private $poids_piece;
    private $supprimer;
    private $autorisationBD = true;

    /**
     * @return mixed
     */
    public function getSupprimer()
    {
        return $this->supprimer;
    }

    /**
     * @param mixed $supprimer
     */
    public function setSupprimer($supprimer): void
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
    public function setAutorisationBD(bool $autorisationBD)
    {
        $this->autorisationBD = $autorisationBD;
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
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return mixed
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * @param mixed $descriptif
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;
    }

    /**
     * @return mixed
     */
    public function getPrix_Unitaire_HT()
    {
        return $this->prix_unitaire_HT;
    }

    /**
     * @param mixed $prix_unitaire_HT
     */
    public function setPrix_Unitaire_HT($prix_unitaire_HT)
    {
        $this->prix_unitaire_HT = $prix_unitaire_HT;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function getPoids_Piece()
    {
        return $this->poids_piece;
    }

    /**
     * @param mixed $poids_piece
     */
    public function setPoids_Piece($poids_piece)
    {
        $this->poids_piece = $poids_piece;
    }


}