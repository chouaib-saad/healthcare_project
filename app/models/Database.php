<?php

class Database
{
    private static $instance = null;
    private $pdo;

    // Informations de connexion à la base de données
    private $host = 'localhost';
    private $dbname = 'cliniqueinfo';
    private $user = 'root';
    private $password = '0000';

    // Constructeur privé pour empêcher l'instanciation directe
    private function __construct()
    {
        // DSN pour se connecter à la base de données
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';

        try {
            // Création de la connexion PDO
            $this->pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gérer les erreurs
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // Méthode pour obtenir l'instance unique de la classe Database
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Méthode pour obtenir l'objet PDO
    public function getPDO()
    {
        return $this->pdo;
    }
}
