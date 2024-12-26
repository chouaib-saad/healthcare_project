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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <title>Convertisseur de Monnaie</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/css/styles.css" />
    <script src="../../../public/js/script.js"></script>
    
    <style>
        body {
            background: linear-gradient(to bottom right, #ffffff, #ffffff);
            color: #333;
        }

        h1 {
            font-weight: bold;
            color: #333;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.9);
        }

        .card-body {
            padding: 30px;
        }

        .form-control {
            border-radius: 10px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            border-radius: 10px;
            background-color: #12ac8e; 
            color: #fff; 
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0f8c6a;
            border-color: #0f8c6a; 
        }

        footer {
            margin-top: 100px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }
    </style>


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
                <h1>Convertisseur de Monnaie</h1>
                <p>Sélectionnez un service ou entrez un montant personnalisé pour convertir dans la devise souhaitée.</p>
            </div>
        </div>
    </header>

    <main class="section__container mt-5">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <form id="converterForm">
                    <div class="form-group">
                        <label for="service">Choisir un Service :</label>
                        <select id="service" class="form-control">
                            <?php foreach ($items as $service): ?>
                                <option value="<?= $service['price'] ?>">
                                    <?= $service['name'] ?> - <?= $service['price'] ?> TND
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customAmount">Ou entrer un montant personnalisé (TND) :</label>
                        <input type="number" id="customAmount" class="form-control" placeholder="Ex : 150">
                    </div>
                    <div class="form-group">
                        <label for="currency">Choisir la devise :</label>
                        <select id="currency" class="form-control">
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary btn-block" onclick="convertCurrency()">Convertir</button>
                </form>
                <p id="result" class="mt-3 text-center"></p>
            </div>
        </div>
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
