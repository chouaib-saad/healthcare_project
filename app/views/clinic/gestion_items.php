<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: /healthcare_project/app/views/users/login.php');
    exit;
}

// Include the necessary files
require_once '../../../app/models/Item.php';

// Create an instance of the Item class
$itemModel = new Item();

// Handle form submission for adding a new item
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_item'])) {
        // Add item
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $itemModel->addItem($name, $description, $price);  // Pass data to model
    } elseif (isset($_POST['delete_item'])) {
        // Delete item
        $itemId = $_POST['item_id'];
        $itemModel->deleteItem($itemId);  // Pass item ID to delete
    }
}

// Fetch all items to display
$items = $itemModel->getAll();
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
    <title>Gestion des services</title>
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
                <li class="link"><a href="../app/views/clinic/converter.php">Gestion Panier</a></li>
            </ul>
            
            <div style="padding-right:20px;padding-left:20px;">
            <button class="btn" onclick="window.location.href = 'carte.php';">
                <i class="ri-shopping-cart-line"></i> Voir Panier
            </button>
            </div>
            
            <button class="btn" onclick="window.location.href = '../users/logout.php';">Déconnexion</button>
        </nav>
        <div class="section__container header__container" id="home">
            <div class="header__content">
                <h1>Gestion des Items</h1>
                <p>Gérez les articles de la clinique ici.</p>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="add-item-section">
            <h2 class="section-title">Ajouter un nouvel service</h2>
            <form method="POST" class="item-form">
            <label for="name">Nom:</label>
                <input type="text" name="name" id="name" class="input-field" required>

                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="input-field" required>

                <label for="price">Prix:</label>
                <input type="number" name="price" id="price" class="input-field" required>

                <button type="submit" name="add_item" class="btn add-btn">Ajouter l'item</button>
            </form>
        </section>

        <section class="item-list-section">
            <h2 class="section-title">Liste des items</h2>
            <div class="table-container">
                <table class="item-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['id']) ?></td>
                                <td><?= htmlspecialchars($item['name']) ?></td>
                                <td><?= htmlspecialchars($item['description']) ?></td>
                                <td><?= htmlspecialchars($item['price']) ?></td>
                                <td class="action-buttons">
                                    <form method="POST" class="delete-form" style="display:inline;">
                                        <input type="hidden" name="item_id" value="<?= $item['id']; ?>">
                                        <button type="submit" name="delete_item" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet item ?');">Supprimer</button>
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
