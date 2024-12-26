<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: /healthcare_project/app/views/users/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <title>Tableau de Bord - CliniqueInfo</title>
    <link rel="icon" type="image/png" href="./images/clinic_favicon.png">
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/dashboard.css" />

    <script src="./js/script.js"></script>
    <script src="./js/dashboard.js"></script>

    
</head>

<body class="bg-light">
<header>
        <nav class="section__container nav__container">
                <div class="nav__logo">Clinique<span>Info</span></div>
                <ul class="nav__links">
                <li class="link"><a href="dashboard.php">Accueil</a></li>
                <li class="link"><a href="../app/views/clinic/gestion_utilisateurs.php">Gestion Utilisateurs</a></li>
                <li class="link"><a href="../app/views/clinic/gestion_items.php">Gestion Services</a></li>
                <li class="link"><a href="../app/views/clinic/converter.php">Gestion Panier</a></li>
            </ul>
            <button class="btn" onclick="logout()">Déconnexion</button>
        </nav>
        <div class="section__container header__container" id="home">
            <div class="header__content">
                <h1>Dashboard</h1>
                <p>Bienvenue dans le dashbaoard admin !</p>
            </div>
        </div>
    </header>

    <section class="section__container dashboard-section">
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1>Tableau de Bord Santé</h1>
            <p>Gérez votre établissement de santé efficacement</p>
        </header>
        <div class="cards-grid" id="cardsContainer"></div>
    </div>
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
