<?php

include_once 'Reservation.php';

class ReservationDAO {

    private $db;

    // Constructeur 
    public function __construct($pdo) {
        $this->setDb($pdo);
    }

    public function setDb($db) {
        $this->db = $db;
    }

    public function getDb() {
        return $this->db;
    }

    // Ajouter une réservation
    public function ajouterReservation($client) {

        $date = $client->getDate();
        $nom = $client->getNom();
        $prenom = $client->getPrenom();
        $tel = $client->getTel();
        $email = $client->getEmail();

        $req = $this->getDb()->prepare("INSERT INTO Reservation (date, nom, prenom, tel, email) VALUES (?, ?, ?, ?, ?)");
        $req->execute([$date, $nom, $prenom, $tel, $email]);
    }

    // Obtenir une ou plusieurs réservations d'un client
    public function getReservations($email) {

        $req = $this->getDb()->prepare("SELECT * FROM Reservation WHERE email = ?");
        $req->execute([$email]);
        return $req->fetchAll();
    }

    // Annuler une réservation
    public function annulerReservation($idReservation, $email) {
        $req = $this->getDb()->prepare("DELETE FROM Reservation WHERE idReservation = ? AND email = ?");
        $req->execute([$idReservation, $email]);
    }

}
