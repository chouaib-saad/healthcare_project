<?php

require_once 'BaseController.php';
require_once '../models/User.php';

class UserController extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    // Afficher la liste des utilisateurs
    public function index()
    {
        $users = $this->userModel->getAllUsers();
        $this->render('users/index', ['users' => $users]);
    }

    // Ajouter un utilisateur
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $email = $_POST['email'];  // Get email from the form
    
            if (empty($username) || empty($password) || empty($role) || empty($email)) {
                $error = 'Tous les champs sont obligatoires';
                $this->render('users/add', ['error' => $error]);
                return;
            }
    
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            if ($this->userModel->addUser($username, $hashedPassword, $role, $email)) {
                header('Location: /admin/users');
                exit;
            } else {
                $this->render('users/add', ['error' => 'Erreur lors de l\'ajout de l\'utilisateur']);
            }
        } else {
            $this->render('users/add');
        }
    }
    

    // Supprimer un utilisateur par ID
    public function delete($id)
    {
        if ($this->userModel->deleteUser($id)) {
            header('Location: /admin/users');
            exit;
        } else {
            echo 'Erreur lors de la suppression de l\'utilisateur';
        }
    }

    public function signin()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $error = 'Veuillez remplir tous les champs.';
            $this->render('users/signin', ['error' => $error]);
            return;
        }

        // Vérification des informations de connexion
        $user = $this->userModel->getUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            // Connexion réussie - Stocker dans la session
            session_start();
            $_SESSION['username'] = $user['username'];
            header('Location: /'); // Redirection vers la page principale
            exit;
        } else {
            $this->render('users/signin', ['error' => 'Nom d\'utilisateur ou mot de passe incorrect']);
        }
    } else {
        $this->render('users/signin');
    }
}

}
