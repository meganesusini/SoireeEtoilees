<?php

class Soiree {

    private $id;
    private $date;
    private $nbPlaces;
    private $libelle;

    // Constructeur
    public function __construct($id, $date, $nbPlaces, $libelle)
    {
        $this->id = $id;
        $this->date = $date;
        $this->nbPlaces = $nbPlaces;
        $this->libelle = $libelle;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces($nbPlaces)
    {
        $this->nbPlaces = $nbPlaces;
    }

}