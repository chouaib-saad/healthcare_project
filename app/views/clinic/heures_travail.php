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
    <link rel="icon" type="image/png" href="../../../public/images/clinic_favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../public/css/styles.css" />
    <title>Heures d'Ouverture des Cliniques</title>
    <script src="../../../public/js/script.js"></script>
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
                <h1>Heures d'Ouverture des Cliniques</h1>
                <p>Nos cliniques sont ouvertes à des horaires pratiques pour vous fournir les soins dont vous avez besoin.</p>
            </div>
        </div>
    </header>

    <main class="section__container">
        <h3>Horaires d'Ouverture</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Jour</th>
                    <th>Heures d'Ouverture</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lundi - Vendredi</td>
                    <td>8h00 - 18h00</td>
                </tr>
                <tr>
                    <td>Samedi</td>
                    <td>9h00 - 16h00</td>
                </tr>
                <tr>
                    <td>Dimanche</td>
                    <td>Fermé</td>
                </tr>
            </tbody>
        </table>

        <section class="my-4 text-center">
            <h2>Heures d'Ouverture de la Clinique</h2>
            <img src="../../../public/images/heure_trav.jpg" alt="Intérieur de la clinique" class="img-fluid rounded mx-auto d-block img-spacing">
        </section>
        
        
        <nav class="text-center my-4">
            <a href="../../../public/index.php" class="btn btn-secondary">Retour à la Page d'Accueil</a>
            <a href="https://www.carthagene.tn/votre-sejour/circuit-patients/" target="_blank" class="btn btn-info">Vérifier les Horaires Actualisés</a>
        </nav>
        
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

<?php
// End the PHP block (if you need any additional PHP code, you can add it here)
?>
