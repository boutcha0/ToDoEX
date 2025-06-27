<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>To-Do List Full Stack (Laravel + Vue.js)</title>
  <style>
    body {
      font-family: sans-serif;
      line-height: 1.6;
      max-width: 800px;
      margin: 2rem auto;
      padding: 0 1rem;
    }
    code, pre {
      background: #f4f4f4;
      padding: 0.2rem 0.4rem;
      border-radius: 4px;
      font-size: 0.9rem;
    }
    pre {
      overflow-x: auto;
      padding: 1rem;
    }
    h1, h2, h3 {
      color: #2c3e50;
    }
    ul {
      margin-left: 1.5rem;
    }
    img.badge {
      height: 28px;
      margin-right: 8px;
      vertical-align: middle;
    }
  </style>
</head>
<body>

  <h1>To-Do List Full Stack (Laravel + Vue.js)</h1>

  <p>
    <img class="badge" src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
    <img class="badge" src="https://img.shields.io/badge/vuejs-%2335495e.svg?style=for-the-badge&logo=vuedotjs&logoColor=%234FC08D" alt="Vue.js">
    <img class="badge" src="https://img.shields.io/badge/pusher-%2330A4FB.svg?style=for-the-badge&logo=pusher&logoColor=white" alt="Pusher">
  </p>

  <p>Application de gestion de tâches avec authentification JWT et notifications en temps réel via Pusher.</p>

  <h2>Fonctionnalités</h2>
  <ul>
    <li>🔐 Authentification JWT (inscription/connexion)</li>
    <li>📋 CRUD complet des tâches</li>
    <li>🔔 Notifications temps réel lors de la création de tâches</li>
    <li>🔒 Sécurité : chaque utilisateur ne voit que ses propres tâches</li>
    <li>🔄 Synchronisation en temps réel avec Laravel Echo et Pusher</li>
  </ul>

  <h2>Prérequis</h2>
  <ul>
    <li>PHP 8.1+</li>
    <li>Composer</li>
    <li>Node.js 16+</li>
    <li>NPM</li>
    <li>Base de données MySQL ou PostgreSQL</li>
    <li>Compte <a href="https://pusher.com/" target="_blank">Pusher</a></li>
  </ul>

  <h2>Installation Backend (Laravel)</h2>

  <ol>
    <li><strong>Cloner le dépôt</strong>
      <pre><code>git clone https://github.com/boutcha0/ToDoEX.git
cd backend</code></pre>
    </li>

    <li><strong>Installer les dépendances PHP</strong>
      <pre><code>composer install</code></pre>
    </li>

    <li><strong>Copier le fichier d'environnement</strong>
      <pre><code>cp .env.example .env</code></pre>
    </li>

    <li><strong>Configurer les variables d'environnement</strong>
      <pre><code>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_bdd
DB_USERNAME=utilisateur_bdd
DB_PASSWORD=mdp_bdd

PUSHER_APP_ID=votre_app_id
PUSHER_APP_KEY=votre_app_key
PUSHER_APP_SECRET=votre_app_secret
PUSHER_APP_CLUSTER=mt1

JWT_SECRET=clé_secrète_pour_jwt
      </code></pre>
    </li>

    <li><strong>Générer la clé d'application</strong>
      <pre><code>php artisan key:generate</code></pre>
    </li>

    <li><strong>Générer la clé JWT</strong>
      <pre><code>php artisan jwt:secret</code></pre>
    </li>

    <li><strong>Exécuter les migrations</strong>
      <pre><code>php artisan migrate</code></pre>
    </li>

    <li><strong>Démarrer le serveur</strong>
      <pre><code>php artisan serve</code></pre>
    </li>
  </ol>

</body>
</html>
