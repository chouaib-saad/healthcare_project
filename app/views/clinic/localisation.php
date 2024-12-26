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
    <title>Emplacements des Cliniques</title>
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
                <h1>Emplacements du Cliniques</h1>
                <p>Découvrez nos cliniques médicales et les services que nous offrons.</p>
            </div>
        </div>
    </header>

    <main class="section__container">
        <section class="services__container">
            <h2 class="section__header">Services Offerts</h2>
            <p>Nos cliniques médicales offrent une variété de services de santé pour répondre à vos besoins, y compris :</p>
            <ul class="list-group">
                <li class="list-group-item">Examens de santé généraux</li>
                <li class="list-group-item">Pédiatrie</li>
                <li class="list-group-item">Consultations de spécialistes</li>
                <li class="list-group-item">Soins d'urgence</li>
            </ul>
        </section>

        <section class="images__container">
            <h2 class="section__header">Photos de la Clinique</h2>
            <div class="image-container">
                <figure>
                    <img src="../../../public/images/clinic1.jpg" alt="Intérieur de la clinique" class="img-fluid rounded styled-img">
                    <figcaption>Intérieur de la clinique</figcaption>
                </figure>
                <figure>
                    <img src="../../../public/images/clinic2.jpg" alt="Équipement médical" class="img-fluid rounded styled-img">
                    <figcaption>Soins intensifs</figcaption>
                </figure>
            </div>
        </section>

        <section class="services__container">
            <h2 class="section__header">Carte des Emplacements des Cliniques</h2>
            <div class="map-container">
                <img src="../../../public/images/clinic-locations.jpg" alt="Carte des emplacements des cliniques" class="img-fluid">
            </div>
        </section>

        <section class="services__container">
            <h2 class="section__header">Emplacements des Cliniques</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Emplacement</th>
                        <th>Adresse</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Clinique Carthagène - Centre-ville</td>
                        <td>123 Avenue Habib Bourguiba, Tunis</td>
                        <td>+216 71 123 456</td>
                    </tr>
                    <tr>
                        <td>Clinique Carthagène - La Marsa</td>
                        <td>45 Rue de la Mer, La Marsa, Tunis</td>
                        <td>+216 71 654 321</td>
                    </tr>
                    <tr>
                        <td>Clinique Carthagène - Ariana</td>
                        <td>89 Avenue de l'Indépendance, Ariana</td>
                        <td>+216 70 987 654</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="services__container">
            <h2 class="section__header">Ressources Supplémentaires</h2>
            <p>Pour plus d'informations sur les services médicaux, visitez <a href="https://www.google.com/maps?ll=36.845452,10.19987&z=16&t=m&hl=en&gl=TN&mapclient=embed&cid=9812625178656733317">cette page</a>.</p>
        </section>

        <nav class="mb-4">
            <a href="../../../public/index.php" class="btn btn-primary">Retour à l'aperçu</a>
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
// End the PHP block here
?>
