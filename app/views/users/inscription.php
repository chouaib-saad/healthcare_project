<?php
// inscription.php
require_once __DIR__ . '/../../models/Database.php';

// Récupérer l'instance de la base de données
$database = Database::getInstance();
$pdo = $database->getPDO();  // Récupérer l'objet PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirmPassword) {
        echo "<script>alert('Les mots de passe ne correspondent pas'); window.location.href='inscription.php';</script>";
        exit;
    }

    // Hachage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Vérifier si l'utilisateur existe déjà
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    $stmt->execute(['username' => $username, 'email' => $email]);

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Nom d\'utilisateur ou email déjà utilisé'); window.location.href='inscription.php';</script>";
        exit;
    }

    // Insérer l'utilisateur dans la base de données
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, 'user')");
    $stmt->execute(['username' => $username, 'email' => $email, 'password' => $hashedPassword]);

    echo "<script>alert('Inscription réussie !'); window.location.href='login.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../..login_favic.png">
    <title>Inscription</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-custom {
            background-color: #12ac8e;
            border-color: #12ac8e;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0e8a6e;
            border-color: #0e8a6e;
        }
        a {
            color: #12ac8e;
        }
        a:hover {
            color: #0e8a6e;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4" style="color: #0e8a6e;">Inscription</h1>
                <form method="POST" action="inscription.php" class="bg-white p-4 shadow rounded">
                    <div class="form-group">
                        <label>Nom d'utilisateur:</label>
                        <input type="text" name="username" class="form-control" placeholder="Entrez votre nom d'utilisateur" required>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Entrez votre adresse email" required>
                    </div>
                    <div class="form-group">
                        <label>Mot de passe:</label>
                        <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                    </div>
                    <div class="form-group">
                        <label>Confirmer le mot de passe:</label>
                        <input type="password" name="confirmPassword" class="form-control" placeholder="Confirmez votre mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-custom btn-block">S'inscrire</button>
                    <p class="text-center mt-3">Déjà inscrit? <a href="login.php">Connexion</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
