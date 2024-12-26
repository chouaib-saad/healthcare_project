<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: /healthcare_project/app/views/users/login.php');
    exit;
}

// Include the necessary files
require_once __DIR__ . '/../../models/User.php'; // Correct path

// Create an instance of the User class
$userModel = new User();

// Check if form data has been posted for adding or deleting a user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_user'])) {
        // Add user
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $email = $_POST['email'];  // Added email field
        $userModel->addUser($username, $password, $role, $email);  // Pass email to model
    } elseif (isset($_POST['delete_user'])) {
        // Delete user
        $userId = $_POST['user_id'];
        $userModel->deleteUser($userId);
    }
}

// Fetch all users to display
$users = $userModel->getAllUsers();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../../../public/images/clinic_favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="../../../public/css/styles.css">
    <link rel="stylesheet" href="../../../public/css/admin.css">

    <title>Gestion Utilisateurs</title>
    <script src="../../../public/js/script.js"></script>

</head>
<body>
    <header>
    <nav class="section__container nav__container">
                <div class="nav__logo">Clinique<span>Info</span></div>
                <ul class="nav__links">
                <li class="link"><a href="../../../public/dashboard.php">Accueil</a></li>
                <li class="link"><a href="gestion_utilisateurs.php">Gestion Utilisateurs</a></li>
                <li class="link"><a href="gestion_items.php">Gestion Items</a></li>
            </ul>

            <button class="btn" onclick="window.location.href = '../users/logout.php';">Déconnexion</button>
        </nav>
        <div class="section__container header__container" id="home">
            <div class="header__content">
                <h1>Gestion des Utilisateurs</h1>
                <p>Gérez les utilisateurs de la clinique ici.</p>
            </div>
        </div>
    </header>

    <main class="container">
        <!-- /app/views/users/manage.php -->
        <section class="add-user-section">
            <h2 class="section-title">Ajouter un nouvel utilisateur</h2>
            <form method="POST" class="user-form">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" name="username" id="username" class="input-field" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="input-field" required>

                <label for="password">Mot de passe:</label>
                <input type="password" name="password" id="password" class="input-field" required>

                <label for="role">Rôle:</label>
                <select name="role" id="role" class="input-field" required>
                    <option value="admin">Admin</option>
                    <option value="user">Utilisateur</option>
                </select>

                <button type="submit" name="add_user" class="btn add-btn">Ajouter l'utilisateur</button>
            </form>
        </section>

        <section class="user-list-section">
            <h2 class="section-title">Liste des utilisateurs</h2>
            <div class="table-container">
                <table class="user-table">
                <thead>
    <tr>
        <th>ID</th>
        <th>Nom d'utilisateur</th>
        <th>Rôle</th>
        <th>Email</th>  <!-- Add Email column -->
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['username']); ?></td>
            <td><?php echo htmlspecialchars($user['role']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td> <!-- Display email -->
            <td class="action-buttons">
                <form method="POST" class="delete-form" style="display:inline;">
                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <button type="submit" name="delete_user" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

                </table>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="section__container footer__container">
            <div class="footer__col">
                <h3>Clinique<span>Info</span></h3>
                <p>
                    Nous sommes honorés de faire partie de votre parcours de santé et
                    engagés à fournir des soins compatissants, personnalisés et de
                    haute qualité à chaque étape.
                </p>
                <p>
                    Faites-nous confiance pour votre santé, et travaillons ensemble
                    pour obtenir les meilleurs résultats possibles pour vous et vos
                    proches.
                </p>
            </div>
            <div class="footer__col">
                <h4>À propos de nous</h4>
                <p>Accueil</p>
                <p>À propos de nous</p>
                <p>Travaillez avec nous</p>
                <p>Notre blog</p>
                <p>Termes et Conditions</p>
            </div>
            <div class="footer__col">
                <h4>Services</h4>
                <p>Termes de recherche</p>
                <p>Recherche avancée</p>
                <p>Politique de confidentialité</p>
                <p>Fournisseurs</p>
                <p>Nos magasins</p>
            </div>
            <div class="footer__col">
                <h4>Contactez-nous</h4>
                <p>
                    <i class="ri-map-pin-2-fill"></i> sousse, Suisse, Tafela 3181
                </p>
                <p><i class="ri-mail-fill"></i>Saad.Chouaib@issatso.u-sousse.tn</p>
                <p><i class="ri-phone-fill"></i> (+216) 26078277</p>
            </div>
        </div>
        <div class="footer__bar">
            <div class="footer__bar__content">
                <p>Droits d'auteur © 2024 chouaib saad 2ING G4 . Tous droits réservés.</p>
                <div class="footer__socials">
                    <span><i class="ri-instagram-line"></i></span>
                    <span><i class="ri-facebook-fill"></i></span>
                    <span><i class="ri-heart-fill"></i></span>
                    <span><i class="ri-twitter-fill"></i></span>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
