<?php

class Prestataire
{
    private $id;
    private $nom;
    private $adresse;
    private $numCertif;
    private $nomOrganisme;

    public function __construct($nom, $adresse, $numCertif, $nomOrganisme) {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->numCertif = $numCertif;
        $this->nomOrganisme = $nomOrganisme;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse =$adresse;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getnumCertif()
    {
        return $this->numCertif;
    }

    public function setnumCertif($numCertif)
    {
        $this->numCertif = $numCertif;
    }

    public function getnomOrganisme()
    {
        return $this->nomOrganisme;
    }

    public function setnomOrganisme($nomOrganisme)
    {
        $this->nomOrganisme = $nomOrganisme;
    }


}