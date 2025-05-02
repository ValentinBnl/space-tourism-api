Space Tourism API

Projet Laravel permettant la gestion d'une API REST pour un site de tourisme spatial. Il inclut un panneau d'administration sécurisé, une documentation technique automatisée et une interface utilisateur de test.

🚀 Objectifs

Conception d'une API REST avec Laravel

Authentification pour la partie admin

Gestion des entités : Destinations, Crews, Technologies (CRUD)

Documentation automatisée avec Scribe

Interface d'administration avec Blade

👀 Aperçu du projet

API: /api/destinations, /api/crews, /api/technologies

Admin: /admin/destinations, /admin/crews, /admin/technologies

Docs API: http://localhost:8000/docs

⚖️ Prérequis

PHP >= 8.2

Composer

Node.js et NPM

SQLite (utilisé par défaut)

⚡ Installation

git clone cd space-tourism-api composer install npm install cp .env.example .env php artisan key:generate touch database/database.sqlite php artisan migrate --seed npm run dev php artisan serve

🌐 Accès

Admin panel : http://localhost:8000/admin/destinations

API Docs : http://localhost:8000/docs

🔒 Connexion

Créez un compte en accédant à /register, puis connectez-vous via /login. Une fois authentifié, vous pouvez accéder au panneau d'administration.

📚 Documentation API (Scribe)

Générée automatiquement à partir des contrôleurs API via les annotations PHPDoc. Accessible via /docs.

Pour regénérer la documentation :

php artisan scribe:generate

📂 Modèles gérés

Destination

name (string, required)

description (text, required)

image (string, nullable)

Crew

name (string, required)

role (string, required)

bio (text, nullable)

image (string, nullable)

Technology

name (string, required)

description (text, nullable)

image (string, nullable)

🚫 Authentification

L'authentification est nécessaire pour accéder au back-office. Implémentée avec Laravel Breeze.

👁️

Projet réalisé dans le cadre de l'ECF DWWM 2024 - CEFIM
