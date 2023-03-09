<?php
include_once 'Prestataire.php';

class PrestataireDAO {
    private $db;

    // Constructeur permettant la connexion à la BD
    public function __construct($pdo) {
        $this->setDb($pdo);
    }

    public function setDb($db) {
        $this->db = $db;
    }

    public function getDb() {
        return $this->db;
    }

    // Ajouter un prestataire
    public function ajouterPrestataire($nvPresta) {

        $nom = $nvPresta->getNom();
        $adresse = $nvPresta->getAdresse();
        $numCertif = $nvPresta->getnumCertif();
        $nomOrganisme = $nvPresta->getnomOrganisme();

        // Préparation de la requête
        $req = $this->getDb()->prepare("INSERT INTO Prestataire (nom, adresse, numCertif, nomOrganisme) VALUES (?, ?, ?, ?)");
        // Exécution de la requête
        $req->execute([$nom, $adresse, $numCertif, $nomOrganisme]);
    }
    
     // Obtenir une liste de touts les types de prestataire
    public function getLesTypesPresta() {
        $req = $this->getDb()->prepare("SELECT * FROM typePrestataire");
        $req->execute();
        return $req->fetchAll();
    }
}