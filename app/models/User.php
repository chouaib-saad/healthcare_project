<?php

require_once __DIR__ . '/../models/Database.php';

class User
{
    private $db;

    public function __construct()
    {
        // Récupérer l'instance de la base de données et obtenir l'objet PDO
        $this->db = Database::getInstance()->getPDO();
    }

    // Récupérer tous les utilisateurs
    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ajouter un utilisateur
 // Ajouter un utilisateur avec un email
public function addUser($username, $password, $role, $email)
{
    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email format");
    }

    // Hash du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Préparer la requête d'insertion
    $query = "INSERT INTO users (username, password, role, email) VALUES (:username, :password, :role, :email)";
    $stmt = $this->db->prepare($query);

    // Exécuter la requête
    return $stmt->execute([
        ':username' => $username,
        ':password' => $hashedPassword,
        ':role' => $role,
        ':email' => $email
    ]);
}


    // Supprimer un utilisateur par ID
    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    public function getUserByUsername($username)
{
    $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
    $stmt = $this->db->prepare($query);
    $stmt->execute([':username' => $username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}


