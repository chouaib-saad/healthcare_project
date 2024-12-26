<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: /healthcare_project/app/views/users/login.php');
    exit;
}


// Include the Item class to fetch data from the database
require_once '../../../app/models/Item.php';

// Instantiate the Item object
$item = new Item();

// Fetch all items from the database
$items = $item->getAll();
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
    <link rel="stylesheet" href="../../../public/css/styles.css" />
    <title>Services de la Clinique</title>
    <script src="../../../public/js/script.js"></script>
    <script src="../../../public/js/panier.js" defer></script>
</head>

<body>
    <header>
        <nav class="section__container nav__container">
            <div class="nav__logo">Clinique<span>Info</span></div>
            <ul class="nav__links">
                
                <li class="link"><a href="../../../public/index.php">Accueil</a></li>
                <li class="link"><a href="heures_travail.php">Heures d'Ouverture</a></li>
                <li class="link"><a href="converter.php">Currency Converter</a></li>
                <li class="link"><a href="services.php">Services</a></li>
                <li class="link"><a href="localisation.php">Localisation</a></li> 
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
                <h1>Nos Services Médicaux</h1>
                <p>
                    Découvrez la gamme complète de services que nous offrons pour 
                    assurer votre bien-être.
                </p>
            </div>
        </div>

    </header>

    <section class="section__container images__container">
        <h2 class="section__header">Images de Nos Services</h2>
        <div class="image-container">
            <img src="../../../public/images/services1.jpg" alt="Consultation Générale" />
            <img src="../../../public/images/serv2.jpg" alt="Tests de Laboratoire" />
            <img src="../../../public/images/emp1.jpg" alt="Radiologie" />
            <img src="../../../public/images/clinic2.jpg" alt="Soins Dentaires" />        
        </div>
    </section>
    
    <section class="section__container services__container">
    <h2 class="section__header">Tableau des Services</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Service</th>
                <th>Description</th>
                <th>Tarif</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $itemData): ?>
            <tr>
                <td><?php echo htmlspecialchars($itemData['name']); ?></td>
                <td><?php echo htmlspecialchars($itemData['description']); ?></td>
                <td><?php echo htmlspecialchars($itemData['price']) . ' TND'; ?></td>
                <td>
                    <!-- Ajouter au panier -->
                    <button class="btn btn-primary" onclick="addToCart('<?php echo $itemData['id']; ?>', '<?php echo $itemData['name']; ?>', <?php echo $itemData['price']; ?>)">Ajouter au panier</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
    

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
