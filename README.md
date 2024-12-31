# CliniqueInfo

## Auteur
**Nom** : Chouaib Saad  
**Niveau** : NG A2  
**Groupe** : 4  

---

## Description du Projet
**CliniqueInfo** est une application web conçue pour gérer les items, utilisateurs, et le panier électronique, tout en intégrant des fonctionnalités interactives et dynamiques. Ce projet combine des technologies front-end et back-end pour offrir une expérience utilisateur complète, respectant l'architecture MVC (Model-View-Controller).

---

## Fonctionnalités Principales
### Partie 1 : Front-End (HTML/CSS)
1. **Création d'un mini-site statique en HTML/CSS :**
   - Un sommaire (index.html) introduisant le projet et les différentes pages.
   - Trois pages HTML partageant un même style visuel.
   - Inclusion de tableaux, images, liens internes et externes.
   - Unité visuelle assurée par des feuilles CSS (règles communes et spécifiques).

2. **Spécifications techniques :**
   - Structure HTML optimisée avec balises, classes et ID bien définis.
   - Feuilles CSS intégrant des propriétés avancées, des media-queries pour l'adaptabilité, et une variété de sélecteurs.

3. **Optimisation des performances :**
   - Test du site avec Google Lighthouse pour évaluer les métriques de performance et d'accessibilité.

---

### Partie 2 : Interactivité avec JavaScript
1. **Validation des Formulaires :**
   - **Formulaire d'inscription :**
     - Validation des champs (nom d'utilisateur, email, mot de passe).
     - Gestion des messages d'erreur et icônes de validation (succès/échec).
     - Vérification du format d'email et de la complexité du mot de passe.
     - Ajout des utilisateurs validés dans un tableau.

   - **Formulaire de login :**
     - Validation des champs.
     - Vérification de l'existence de l'utilisateur dans le tableau.

2. **Convertisseur de Devises :**
   - Outil permettant de convertir les prix des items dans différentes devises.

---

### Partie 3 : Back-End avec PHP
#### Gestion des Items
- Formulaire d'ajout et de suppression d'items.
- Contrôleur `ItemController` pour la logique métier liée aux items.
- Modèle `Item` pour représenter les données.

#### Gestion des Utilisateurs
- Formulaire d'ajout et de suppression d'utilisateurs.
- Contrôleur `UserController` pour les fonctionnalités utilisateur.
- Modèle `User` pour la gestion des données utilisateur.

#### Gestion du Panier Électronique
- Mise en œuvre d'un panier électronique par utilisateur en utilisant des cookies sécurisés.

---

## Architecture du Projet
Le projet est organisé selon l'architecture MVC, avec une séparation claire entre les composants front-end et back-end.

### Arborescence des Fichiers

/HEALTHCARE_PROJECT/
├── /app/
│   ├── /controllers/
│   │   ├── BaseController.php
│   │   ├── ItemController.php
│   │   └── UserController.php
│   ├── /models/
│   │   ├── Database.php
│   │   ├── Item.php
│   │   └── User.php
│   └── /views/
│       ├── /clinic/
│       │   ├── carte.php
│       │   ├── converter.php
│       │   ├── gestion_items.php
│       │   ├── gestion_utilisateurs.php
│       │   ├── heures_travail.php
│       │   ├── localisation.php
│       │   └── services.php
│       ├── /items/
│       │   ├── add.php
│       │   └── delete.php
│       ├── /users/
│       │   ├── add.php
│       │   ├── delete.php
│       │   ├── inscription.php
│       │   ├── login.php
│       │   └── logout.php
│       └── layout.php
├── /config/
│   └── config.php
├── /public/
│   ├── /css/
│   │   ├── admin.css
│   │   ├── dashboard.css
│   │   ├── panier.css
│   │   └── styles.css
│   ├── /images/
│   ├── /js/
│   │   ├── dashboard.js
│   │   ├── demande.js
│   │   ├── panier.js
│   │   └── script.js
│   ├── dashboard.php
│   └── index.php
├── .gitattributes
└── README.md




### Détails Techniques des Fichiers
- **BaseController.php** : Contient les fonctionnalités partagées entre les contrôleurs.
- **Database.php** : Gère la connexion à la base de données MySQL.
- **layout.php** : Gabarit principal pour la mise en page des vues.

---

## Technologies Utilisées
1. **HTML & CSS** :
   - Création de pages statiques avec un design responsive et cohérent.
2. **JavaScript** :
   - Validation des formulaires et ajout d'interactivité.
   - Gestion du DOM pour des expériences utilisateur dynamiques.
3. **PHP** :
   - Back-end basé sur l'architecture MVC.
   - Gestion des données et logique métier.
4. **MySQL** :
   - Base de données relationnelle pour stocker et gérer les données.
5. **Cookies** :
   - Utilisés pour gérer le panier électronique en respectant les bonnes pratiques de sécurité.

---

## Importance du Projet
1. **Apprentissage Pratique :**
   - Application concrète des concepts HTML/CSS, JavaScript et PHP.
   - Mise en œuvre d'une architecture MVC.

2. **Expérience Utilisateur :**
   - Création d'un mini-site interactif et intuitif.
   - Intégration de fonctionnalités dynamiques pour une meilleure navigation.

3. **Gestion Professionnelle :**
   - Structuration des fichiers et respect des bonnes pratiques.
   - Validation des données côté client et côté serveur pour une sécurité optimale.

4. **Perspectives Réelles :**
   - Projet pouvant être étendu pour répondre aux besoins d'une vraie application clinique.

---

## Comment Lancer le Projet
1. **Installation :**
   - Cloner le dépôt.
   - Configurer le fichier `config.php` avec les détails de votre base de données.
2. **Base de Données :**
   - Créer une base de données MySQL nommée `cliniqueinfo`.
   - Importer le fichier SQL pour initialiser les tables.
3. **Exécution :**
   - Lancer un serveur local (e.g., XAMPP, WAMP).
   - Accéder à `http://localhost/cliniqueinfo/public/index.php`.

---

## Conclusion
Le projet **CliniqueInfo** représente une solution complète pour la gestion d'items et d'utilisateurs, intégrant des fonctionnalités dynamiques et une architecture robuste. Ce projet met en avant l'importance des technologies modernes pour offrir une expérience utilisateur optimale et des performances fiables.

---
