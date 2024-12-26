<?php
// login.php
require_once __DIR__ . '/../../models/Database.php';
$pdo = Database::getInstance()->getPDO();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Vérifier l'utilisateur
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Store user details in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        // Check user role and redirect accordingly
        if ($user['role'] == 'admin') {
            header("Location: ../../../public/dashboard.php");
        } else {
            header("Location: ../../../public/index.php");
        }
        exit;
    } else {
        header("Location: login.php?error=invalid_credentials");
        exit;
    }
}
?>

<?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_credentials'): ?>
    <script>alert('Nom d\'utilisateur ou mot de passe incorrect');</script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="login_favic.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
                <h1 class="text-center mb-4" style="color: #0e8a6e;">Connexion</h1>
                <form method="POST" action="login.php" class="bg-white p-4 shadow rounded">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur:</label>
                        <input type="text" name="username" class="form-control" id="username" required placeholder="Nom d'utilisateur">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe:</label>
                        <input type="password" name="password" class="form-control" id="password" required placeholder="Mot de passe">
                    </div>
                    <button type="submit" class="btn btn-custom btn-block">Se connecter</button>
                    <p class="text-center mt-3">Pas encore inscrit? <a href="inscription.php">Inscription</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
