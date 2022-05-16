<?php

class Reservation {

    private $id;
    private $date;
    private $nom;
    private $prenom;
    private $tel;
    private $email;

    public function __construct($id, $date, $nom, $prenom, $tel, $email) {
        $this->id = $id;
        $this->date = $date;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->tel = $tel;
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getTel() {
        return $this->tel;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

}
