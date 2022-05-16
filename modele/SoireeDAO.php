<?php

include_once 'Soiree.php';

class SoireeDAO {

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

    // Ajouter une soirée
    public function ajouterSoiree($soiree) {

        $date = $soiree->getDate();
        $id = $soiree->getId();
        $nbPlaces = $soiree->getNbPlaces();
        $libelle = $soiree->getLibelle();

        $req = $this->getDb()->prepare("INSERT INTO Soiree (idSoiree, date, nbPlaceRestante, libelle) VALUES (?, ?, ?, ?)");
        $req->execute([$id, $date, $nbPlaces, $libelle]);
    }

    // Obtenir toutes les dates des soirées
    public function getAllDates() {

        $stmt = $this->getDb()->prepare("SELECT date FROM Soiree WHERE date > now() ORDER BY idSoiree");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Obtenir tous les id des soirées
    public function getAllIds() {

        $stmt = $this->getDb()->prepare("SELECT idSoiree FROM Soiree WHERE date > now() ORDER BY idSoiree");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Obtenir le nombre de places restantes de toutes les soirées
    public function getAllPlaces() {

        $stmt = $this->getDb()->prepare("SELECT nbPlaceRestante FROM Soiree WHERE date > now() ORDER BY idSoiree");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Obtenir le libellé de toutes les soirées
    public function getLibelles() {

        $stmt = $this->getDb()->prepare("SELECT libelle FROM Soiree WHERE date > now() ORDER BY idSoiree");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Obtenir le nombre de places restantes d'une soirée via sa date
    public function getNbPlacesFromDate($date) {

        $req = $this->getDb()->prepare("SELECT nbPlaceRestante FROM Soiree WHERE date = ?");
        $req->execute([$date]);
        return $req->fetch()[0];
    }

    //
    public function decreasePlace($date) {
        $stmt = $this->getDb()->prepare("UPDATE Soiree SET NbPlaceRestante = (NbPlaceRestante - 1) WHERE date = ?");
        $stmt->execute([$date]);
    }

    //
    public function increasePlaceById($id) {
        $stmt = $this->getDb()->prepare("UPDATE Soiree SET NbPlaceRestante = (NbPlaceRestante + 1) WHERE idSoiree = ?");
        $stmt->execute([$id]);
    }

    // Obtenir le plus grand id d'une soirée
    public function getBiggestId() {
        $stmt = $this->getDb()->prepare("SELECT MAX(idSoiree) AS max FROM Soiree");
        $stmt->execute();
        return $stmt->fetch()[0];
    }

    // Obtenir une liste de toutes les soirées
    public function getLesSoirees() {
        $req = $this->getDb()->prepare("SELECT * FROM Soiree");
        $req->execute();
        return $req->fetchAll();
    }

    // Supprimer une soirée à partir de sa date
    public function supprimerSoiree($date) {

        $req = $this->getDb()->prepare("DELETE FROM Soiree WHERE date = ?");
        $req->execute([$date]);
    }

    // Modifier une soirée
    public function modifierSoiree($idSoiree, $date, $libelle, $nbPlaces) {
        $req = $this->getDb()->prepare("UPDATE Soiree SET date = ?, libelle = ?, NbPlaceRestante = ? WHERE idSoiree = ?");
        $req->execute([$date, $libelle, $nbPlaces, $idSoiree]);
    }

}
