📝 To-Do List Full Stack Application
Une application To-Do List Full Stack moderne développée avec Laravel (Backend) et Vue.js (Frontend), intégrant l'authentification JWT, les WebSockets en temps réel, et suivant les meilleures pratiques de développement.
🚀 Technologies Utilisées
Backend

Laravel - Framework PHP moderne
PostgreSQL/MySQL - Base de données relationnelle
JWT Authentication - Authentification sécurisée par tokens
Pusher - Service WebSocket pour les notifications temps réel
Laravel Echo - Broadcasting d'événements

Frontend

Vue.js 3 - Framework JavaScript progressif
Pinia - Gestion d'état moderne pour Vue.js
Axios - Client HTTP pour les appels API
Pusher-js - Client WebSocket
Laravel Echo - Écoute des événements broadcastés

Architecture

Service Pattern - Séparation de la logique métier
Repository Pattern - Abstraction de la couche d'accès aux données
Principes SOLID - Code maintenable et extensible

✨ Fonctionnalités
🔐 Authentification

✅ Inscription avec informations complètes (nom, email, téléphone, adresse, image)
✅ Connexion avec génération de token JWT
✅ Protection des routes par middleware d'authentification
✅ Gestion des sessions avec refresh token

📋 Gestion des Tâches (CRUD)

✅ Créer une nouvelle tâche
✅ Lire la liste des tâches personnelles
✅ Modifier une tâche existante
✅ Supprimer une tâche
✅ Filtrage par statut (pending, completed, in_progress)
✅ Statistiques des tâches par utilisateur

🔔 Notifications Temps Réel

✅ Notifications WebSocket lors de la création de tâches
✅ Page dédiée aux notifications
✅ Marquer comme lu et supprimer les notifications
✅ Historique des notifications par utilisateur

🏗️ Architecture du Projet
├── Backend (Laravel)
│   ├── app/
│   │   ├── Http/Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── TaskController.php
│   │   │   └── NotificationController.php
│   │   ├── Http/Requests/
│   │   │   ├── LoginRequest.php
│   │   │   ├── RegisterRequest.php
│   │   │   └── TaskRequest.php
│   │   ├── Models/
│   │   │   ├── User.php
│   │   │   ├── Task.php
│   │   │   └── Notification.php
│   │   ├── Services/
│   │   │   ├── AuthService.php
│   │   │   └── TaskService.php
│   │   ├── Events/
│   │   │   └── TaskCreated.php
│   │   └── Providers/
│   └── Frontend (Vue.js)
│       ├── components/
│       ├── views/
│       ├── stores/ (Pinia)
│       └── services/
🛠️ Installation et Configuration
Prérequis

PHP >= 8.1
Composer
Node.js >= 16
PostgreSQL ou MySQL
Compte Pusher (pour WebSockets)

1. Cloner le Repository
bashgit clone https://github.com/boutcha0/ToDoEX.git
cd todo-app-laravel-vue
2. Configuration Backend (Laravel)
bash# Installer les dépendances PHP
composer install

# Copier le fichier d'environnement
cp .env.example .env

# Générer la clé d'application
php artisan key:generate

# Générer la clé JWT
php artisan jwt:secret
3. Configuration de la Base de Données
Modifier le fichier .env avec vos informations de base de données :
envDB_CONNECTION=mysql  # ou pgsql pour PostgreSQL
DB_HOST=127.0.0.1
DB_PORT=3306  # ou 5432 pour PostgreSQL
DB_DATABASE=todo_app
DB_USERNAME=votre_username
DB_PASSWORD=votre_password
4. Configuration Pusher
Ajouter vos identifiants Pusher dans le fichier .env :
envBROADCAST_DRIVER=pusher

PUSHER_APP_ID=votre_app_id
PUSHER_APP_KEY=votre_app_key
PUSHER_APP_SECRET=votre_app_secret
PUSHER_APP_CLUSTER=votre_cluster
5. Configuration JWT
envJWT_SECRET=votre_jwt_secret
JWT_TTL=60
JWT_REFRESH_TTL=20160
6. Migrations et Seeders
bash# Exécuter les migrations
php artisan migrate

🔌 API Endpoints
Authentification
MéthodeEndpointDescriptionPOST/api/auth/registerInscription d'un nouvel utilisateurPOST/api/auth/loginConnexion utilisateurGET/api/auth/meProfil utilisateur connectéPOST/api/auth/logoutDéconnexionPOST/api/auth/refreshRafraîchir le token JWT
Gestion des Tâches
MéthodeEndpointDescriptionGET/api/tasksListe des tâches de l'utilisateurGET/api/tasks/{id}Détail d'une tâchePOST/api/tasksCréer une nouvelle tâchePUT/api/tasks/{id}Modifier une tâcheDELETE/api/tasks/{id}Supprimer une tâche
Notifications
MéthodeEndpointDescriptionGET/api/notificationsListe des notificationsPUT/api/notifications/{id}/readMarquer comme luDELETE/api/notifications/{id}Supprimer une notification
📊 Structure de la Base de Données
Table users

id - Identifiant unique
full_name - Nom complet
email - Adresse email (unique)
phone_number - Numéro de téléphone
address - Adresse
image - Photo de profil
password - Mot de passe hashé
created_at, updated_at - Timestamps

Table tasks

id - Identifiant unique
user_id - Référence vers l'utilisateur
title - Titre de la tâche
description - Description (optionnelle)
status - Statut (pending, completed, in_progress)
priority - Priorité (low, medium, high)
due_date - Date d'échéance (optionnelle)
created_at, updated_at - Timestamps

Table notifications

id - Identifiant unique
user_id - Référence vers l'utilisateur
message - Message de notification
type - Type de notification
read_at - Date de lecture (nullable)
created_at, updated_at - Timestamps
