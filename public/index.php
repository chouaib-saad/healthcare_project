<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /healthcare_project/app/views/users/login.php');
    exit;
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
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
    <title>Aperçu des Cliniques Médicales</title>
    <link rel="icon" type="image/png" href="./images/clinic_favicon.png">
    <link rel="stylesheet" href="./css/styles.css" />
<script src="./js/script.js"></script>
<script src="./js/demande.js"></script>


</head>

<body class="bg-light">
<header>
    <nav class="section__container nav__container">
        <div class="nav__logo">Clinique<span>Info</span></div>
        <ul class="nav__links">
            <li class="link"><a href="index.php">Accueil</a></li>
            <li class="link"><a href="../app/views/clinic/heures_travail.php">Heures d'Ouverture</a></li>
            <li class="link"><a href="../app/views/clinic/converter.php">Currency Converter</a></li>
            <li class="link"><a href="../app/views/clinic/services.php">Services</a></li>
            <li class="link"><a href="../app/views/clinic/localisation.php">Localisation</a></li>
        </ul>

        <div style="padding-right:20px;padding-left:20px;">
            <button class="btn" onclick="window.location.href = '../app/views/clinic/carte.php';">
                <i class="ri-shopping-cart-line"></i> Voir Panier
            </button>
            </div>
            
        <button class="btn" onclick="logout()">Déconnexion</button>
    </nav>
        <div class="section__container header__container" id="home">
            <div class="header__content">
 <?php if (isset($_SESSION['username'])): ?>
    <div style="padding-right:100px;">
            <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?> !</h1>
        </div>
        <?php else: ?>
            <h1>Bienvenue sur notre plateforme !</h1>
        <?php endif; ?>                <p>
                    Bienvenue, où l'expérience patient exceptionnelle est notre priorité. 
                    Avec des soins attentifs, des installations modernes et une approche centrée 
                    sur le patient, nous sommes dédiés à votre bien-être. Faites-nous confiance 
                    pour votre santé et découvrez la différence.
                </p>
                <button class="btn" onclick="window.location.href='../app/views/clinic/services.php';">Voir les Services</button>
            </div>
            <div class="header__form">
                <form>
                    <h4>Réserver Maintenant</h4>
                    <input type="text" placeholder="Prénom" />
                    <input type="text" placeholder="Nom" />
                    <input type="text" placeholder="Adresse" />
                    <input type="text" placeholder="Téléphone" />
                    <button class="btn form__btn">Prendre Rendez-vous</button>
                </form>
            </div>
        </div>
    </header>

    <section class="section__container service__container" id="service">
        <div class="service__header">
            <div class="service__header__content">
                <h2 class="section__header">Nos Services Spéciaux</h2>
                <p>
                    Au-delà de la simple prestation de soins médicaux, notre engagement réside 
                    dans l'offre d'un service inégalé adapté à vos besoins uniques.
                </p>
            </div>
            <button class="service__btn">Demander un Service</button>
        </div>
        <div class="service__grid">
            <div class="service__card">
                <span><i class="ri-microscope-line"></i></span>
                <h4>Tests de Laboratoire</h4>
                <p>
                    Diagnostics Précis, Résultats Rapides : Profitez de tests de laboratoire 
                    de premier ordre dans notre établissement.
                </p>
                <a href="#">En Savoir Plus</a>
            </div>
            <div class="service__card">
                <span><i class="ri-mental-health-line"></i></span>
                <h4>Contrôle de Santé</h4>
                <p>
                    Nos évaluations approfondies et nos expertises vous aident à rester 
                    proactif concernant votre santé.
                </p>
                <a href="#">En Savoir Plus</a>
            </div>
            <div class="service__card">
                <span><i class="ri-hospital-line"></i></span>
                <h4>Soins Dentaires Généraux</h4>
                <p>
                    Expérience de soins bucco-dentaires complets avec notre clinique. Faites-nous 
                    confiance pour garder votre sourire sain et éclatant.
                </p>
                <a href="#">En Savoir Plus</a>
            </div>
        </div>
    </section>

    <section class="section__container about__container" id="about">
        <div class="about__content">
            <h2 class="section__header">À propos de Nous</h2>
            <p>
                Bienvenue sur notre site de santé, votre destination unique pour des informations 
                médicales fiables et complètes. Nous sommes engagés à promouvoir le bien-être 
                et à fournir des ressources précieuses pour vous accompagner dans votre parcours de santé.
            </p>
            <p>
                Explorez notre vaste collection d'articles et de guides rédigés par des experts couvrant 
                une large gamme de sujets de santé. Des informations sur les conditions médicales courantes 
                aux conseils pour un mode de vie sain, notre contenu est conçu pour vous éduquer, vous inspirer 
                et vous soutenir dans la prise de décisions éclairées pour votre santé.
            </p>
            <p>
                Découvrez des conseils pratiques et des recommandations de style de vie pour optimiser votre 
                bien-être physique et mental. Nous croyons que de petits changements peuvent entraîner des 
                améliorations significatives dans votre qualité de vie, et nous sommes là pour vous guider sur 
                la voie vers un vous plus sain et plus heureux.
            </p>
        </div>
        <div class="about__image">
        <img src="./images/about.png" alt="about" />
        </div>
    </section>

    <section class="section__container why__container" id="blog">
        <div class="why__image">
        <img src="./images/choose-us3.jpg" alt="why choose us" />
        </div>
        <div class="why__content">
            <h2 class="section__header">Pourquoi Nous Choisir</h2>
            <p>
                Avec un engagement inébranlable envers votre bien-être, notre équipe de professionnels 
                de la santé hautement qualifiés garantit que vous recevez des expériences patients 
                exceptionnelles.
            </p>
            <div class="why__grid">
                <span><i class="ri-hand-heart-line"></i></span>
                <div>
                    <h4>Soins Intensifs</h4>
                    <p>
                        Notre unité de soins intensifs est équipée de technologies avancées et de 
                        professionnels expérimentés.
                    </p>
                </div>
                <span><i class="ri-truck-line"></i></span>
                <div>
                    <h4>Ambulance Gratuite</h4>
                    <p>
                        Une initiative bienveillante pour donner la priorité à votre santé sans charge financière.
                    </p>
                </div>
                <span><i class="ri-hospital-line"></i></span>
                <div>
                    <h4>Soins Médicaux et Chirurgicaux</h4>
                    <p>
                        Nos services médicaux et chirurgicaux offrent des solutions de santé avancées pour 
                        répondre à vos besoins.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section__container doctors__container" id="pages">
        <div class="doctors__header">
            <div class="doctors__header__content">
                <h2 class="section__header">Nos Docteurs Spéciaux</h2>
                <p>
                    Nous sommes fiers de notre équipe exceptionnelle de docteurs, chacun étant 
                    spécialiste dans son domaine respectif.
                </p>
            </div>
            <div class="doctors__nav">
                <span><i class="ri-arrow-left-line"></i></span>
                <span><i class="ri-arrow-right-line"></i></span>
            </div>
        </div>
        <div class="doctors__grid">
            <div class="doctors__card">
                <div class="doctors__card__image">
                    <img src="./images/doctor-1.jpg" alt="doctor" />
                    <div class="doctors__socials">
                        <span><i class="ri-instagram-line"></i></span>
                        <span><i class="ri-facebook-fill"></i></span>
                        <span><i class="ri-heart-fill"></i></span>
                        <span><i class="ri-twitter-fill"></i></span>
                    </div>
                </div>
                <h4>Dr. Adala Mourad</h4>
                <p>Médecin spécialiste en chirurgie générale,digestive , cancerologique, bariatrique et métabolique</p>
            </div>
            <div class="doctors__card">
                <div class="doctors__card__image">
                    <img src="./images/doctor-2.jpg" alt="doctor" />
                    <div class="doctors__socials">
                        <span><i class="ri-instagram-line"></i></span>
                        <span><i class="ri-facebook-fill"></i></span>
                        <span><i class="ri-heart-fill"></i></span>
                        <span><i class="ri-twitter-fill"></i></span>
                    </div>
                </div>
                <h4>Dr. Amine Khedher</h4>
                <p>Spécialiste en Médecine Interne et Cardiologie</p>
            </div>
            <div class="doctors__card">
                <div class="doctors__card__image">
                    <img src="./images/doctor-3.jpg" alt="doctor" />
                    <div class="doctors__socials">
                        <span><i class="ri-instagram-line"></i></span>
                        <span><i class="ri-facebook-fill"></i></span>
                        <span><i class="ri-heart-fill"></i></span>
                        <span><i class="ri-twitter-fill"></i></span>
                    </div>
                </div>
                <h4>Dr. Hatem Hajjali</h4>
                <p>Gynécologue Obstétricien, spécialiste en pathologies du sein et de la femme</p>
            </div>
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
