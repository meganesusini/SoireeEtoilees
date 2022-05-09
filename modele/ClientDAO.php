<?php
include_once 'Client.php';

class ClientDAO {
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

    // Ajouter un client
    public function ajouterClient($nvClient) {

        $nom = $nvClient->getNom();
        $prenom = $nvClient->getPrenom();
        $email = $nvClient->getEmail();
        $tel = $nvClient->getTel();
        $role = $nvClient->getRole();
        $mdp = $nvClient->getMdp();

        // Préparation de la requête
        $req = $this->getDb()->prepare("INSERT INTO Comptes (nom, prenom, email, tel, role, mdp) VALUES (?, ?, ?, ?, ?, ?)");
        // Exécution de la requête
        $req->execute([$nom, $prenom, $email, $tel, $role, $mdp]);
    }

    // Vérifier l'e-mail d'un client
    public function verifEmail($client) {
        $email = $client->getEmail();

        $req = $this->getDb()->prepare("SELECT COUNT(*) AS nb FROM Comptes WHERE email = ?");
        $req->execute([$email]);

        return $req->fetchAll(); // retourne le nombre de comptes possédant cet email
    }

    // Vérifier si l'e-mail et le mdp sont bons
    public function login($email, $mdp): bool
    {
        $req = $this->getDb()->prepare("SELECT mdp FROM Comptes WHERE email = ?");
        $req->execute([$email]);
        $hash = $req->fetch()["mdp"];

        return password_verify($mdp, $hash); // Vérifie si le mdp saisie correspond au mdp haché dans la BD
    }

    // Obtenir l'e-mail d'un utilisateur via son e-mail
    public function getEmailFromEmail($email) {
        $stmt = $this->getDb()->prepare("SELECT email FROM Comptes WHERE email = ?");
        $stmt->execute([$email]);
        return  $stmt->fetch()["email"];
    }

    // Obtenir le nom de l'utilisateur via son e-mail
    public function getNomFromEmail($email) {
        $stmt = $this->getDb()->prepare("SELECT nom FROM Comptes WHERE email = ?");
        $stmt->execute([$email]);
        return  $stmt->fetch()["nom"];
    }

    // Obtenir le prenom de l'utilisateur via son e-mail
    public function getPrenomFromEmail($email) {
        $stmt = $this->getDb()->prepare("SELECT prenom FROM Comptes WHERE email = ?");
        $stmt->execute([$email]);
        return  $stmt->fetch()["prenom"];
    }

    // Obtenir le tél d'un utilisateur via son e-mail
    public function getTelFromEmail($email) {
        $stmt = $this->getDb()->prepare("SELECT tel FROM Comptes WHERE email = ?");
        $stmt->execute([$email]);
        return  $stmt->fetch()["tel"];
    }

    // Modifier les informations d'un utilisateur
    public function changeInformations($email, $nom, $prenom, $tel, $nvEmail) {
        $stmt = $this->getDb()->prepare("UPDATE Comptes SET email = ?, nom = ?, prenom = ?, tel = ? WHERE email = ?");
        $stmt->execute([$email, $nom, $prenom, $tel, $nvEmail]);
    }

    // Vérifier si la personne connectée est un admin
    public function isAdmin($email): bool
    {
        $stmt = $this->getDb()->prepare("SELECT role FROM Comptes WHERE email = ?");
        $stmt->execute([$email]);
        $out = $stmt->fetch();

        if ($out[0] == 1) {
            return false;

        } else return true;
    }
}