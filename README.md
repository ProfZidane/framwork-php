# PHP Mini Framework

Un framework PHP moderne et léger avec architecture MVC, ORM intégré, système de routing avancé et CLI pour le développement rapide d'applications web.

## Description

Ce framework PHP personnalisé offre une architecture MVC complète avec des fonctionnalités modernes pour développer rapidement des applications web robustes. Il intègre un ORM simple, un système de migration, un router puissant basé sur AltoRouter, et une interface en ligne de commande pour la génération automatique de code.

## Fonctionnalités

### Architecture
- **Pattern MVC** complet (Models, Views, Controllers)
- **Autoloader personnalisé** avec gestion des namespaces
- **Routing avancé** avec AltoRouter et paramètres dynamiques
- **Système de middleware** et guards pour la sécurité

### 🗄Base de données
- **ORM léger** avec Active Record pattern
- **Système de migrations** pour la gestion de schéma
- **Query Builder** intégré pour les requêtes complexes
- **Support PDO** avec gestion des erreurs

### Sécurité
- **Authentification** intégrée avec hachage bcrypt
- **Protection CSRF** avec génération de tokens
- **Guards d'accès** pour protéger les routes
- **Sessions sécurisées**

### 🛠Outils de développement
- **CLI intégré** pour générer models, controllers et vues
- **Script batch Windows** pour l'automatisation
- **Templates prêts à l'emploi**
- **Configuration centralisée**

##  Installation

### Prérequis
- PHP 7.4 ou supérieur
- Serveur web (Apache/Nginx)
- MySQL/MariaDB
- Composer

### Installation du projet

```bash
# Cloner le repository
git clone [votre-repo-url]
cd php-mini-framework

# Installer les dépendances
composer install

# Configuration de la base de données
cp config/db/db.config.php.example config/db/db.config.php
# Éditer le fichier avec vos paramètres de BDD
```

### Configuration de la base de données

Éditez `config/db/db.config.php` :

```php
<?php
$config = [
    "DB_HOST" => "127.0.0.1",
    "DB_PORT" => 3306,
    "DB_DATABASE" => "votre_base",
    "DB_USERNAME" => "votre_utilisateur",
    "DB_PASSWORD" => "votre_mot_de_passe"
];

foreach ($config as $key => $value) {
    $_ENV[$key] = $value;
}
```

### Configuration du serveur web

#### Apache (.htaccess)
```apache
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule . index.php [L]
```

#### Nginx
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

## 📚 Guide de développement

### Structure du projet

```
php-mini-framework/
├── app/
│   ├── Autoloader.php           # Chargeur automatique de classes
│   ├── Controller.php           # Classe de base des contrôleurs
│   ├── Model.php               # Classe de base des modèles (ORM)
│   ├── Database.php            # Gestionnaire de base de données
│   ├── Router.php              # Système de routing
│   ├── Migration.php           # Classe de base des migrations
│   ├── Command.php             # Interface CLI
│   ├── security/               # Classes de sécurité
│   │   ├── CSRF.php           # Protection CSRF
│   │   └── Guard.php          # Middleware d'authentification
│   └── src/
│       ├── Controllers/        # Contrôleurs de l'application
│       ├── Models/            # Modèles de données
│       └── Migrations/        # Fichiers de migration
├── config/
│   └── db/                    # Configuration base de données
├── resources/
│   └── views/                 # Templates et vues
│       └── layouts/           # Layouts communs
├── routes/
│   └── web.php               # Définition des routes
├── vendor/                   # Dépendances Composer
├── framwork.bat             # CLI Windows
├── index.php               # Point d'entrée
└── composer.json
```

### Création d'un modèle

#### 1. Génération automatique (Windows)
```bash
# Lancer le CLI
framwork.bat

# Choisir l'option 1, puis entrer le nom du modèle
```

#### 2. Création manuelle

**app/src/Models/Article.php**
```php
<?php
namespace App;

use App\Model;

class Article extends Model {
    
    protected $fillable = [
        'titre',
        'description',
        'contenu',
        'auteur_id'
    ];
}
```

### Création d'un contrôleur

#### 1. Génération automatique (Windows)
```bash
# Lancer le CLI
framwork.bat

# Choisir l'option 2, puis entrer le nom du contrôleur
```

#### 2. Création manuelle

**app/src/Controllers/ArticleController.php**
```php
<?php
namespace App;

use App\Controller;
use App\Article;

class ArticleController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Afficher tous les articles
     */
    public function index() {
        $article = new Article();
        $articles = $article->get();
        return $articles;
    }
    
    /**
     * Afficher un article spécifique
     */
    public function show($id) {
        $article = new Article();
        $articleData = $article->where('id', $id);
        return $articleData;
    }
    
    /**
     * Créer un nouvel article
     */
    public function store() {
        $article = new Article();
        
        // Validation des données
        if (empty($this->request['titre']) || empty($this->request['description'])) {
            return ['error' => 'Titre et description requis'];
        }
        
        try {
            $article->save($this->request);
            return ['success' => 'Article créé avec succès'];
        } catch (Exception $e) {
            return ['error' => 'Erreur lors de la création'];
        }
    }
    
    /**
     * Mettre à jour un article
     */
    public function update($id) {
        $article = new Article();
        
        foreach ($this->request as $field => $value) {
            if (in_array($field, ['titre', 'description', 'contenu'])) {
                $article->change($id, $field, $value);
            }
        }
        
        return ['success' => 'Article mis à jour'];
    }
    
    /**
     * Supprimer un article
     */
    public function delete($id) {
        $article = new Article();
        $article->pop($id);
        return ['success' => 'Article supprimé'];
    }
}
```

### Utilisation de l'ORM

#### Opérations de base

```php
// Instancier un modèle
$article = new Article();

// Créer un enregistrement
$article->save([
    'titre' => 'Mon Article',
    'description' => 'Description de l\'article',
    'contenu' => 'Contenu complet...',
    'auteur_id' => 1
]);

// Récupérer tous les enregistrements
$articles = $article->get();

// Récupérer des colonnes spécifiques
$titres = $article->get('titre', 'description');

// Rechercher par critère
$articleSpecifique = $article->where('id', 5);
$articlesAuteur = $article->where('auteur_id', 2);

// Mettre à jour
$article->change(1, 'titre', 'Nouveau titre');

// Supprimer
$article->pop(1);
```

#### Requêtes avancées

```php
// Dans votre modèle ou contrôleur
class Article extends Model {
    
    /**
     * Récupérer les articles avec leur auteur
     */
    public function getWithAuthor() {
        $sql = "SELECT a.*, u.name as auteur_name 
                FROM article a 
                JOIN utilisateurs u ON a.auteur_id = u.id";
        
        $req = $this->requestSQL($sql);
        return $req->fetchAll();
    }
    
    /**
     * Rechercher par titre
     */
    public function searchByTitle($terme) {
        $sql = "SELECT * FROM article WHERE titre LIKE :terme";
        $req = $this->getPDO()->prepare($sql);
        $req->execute(['terme' => "%$terme%"]);
        return $req->fetchAll();
    }
}
```

### Création de migrations

**app/src/Migrations/CreateArticleTable.php**
```php
<?php
namespace App;

use App\Migration;

class CreateArticleTable extends Migration {
    
    protected $schema = [
        [
            "name" => "id",
            "type" => "INT",
            "add" => "PRIMARY KEY NOT NULL AUTO_INCREMENT"
        ],
        [
            "name" => "titre",
            "type" => "VARCHAR(200)",
            "add" => "NOT NULL"
        ],
        [
            "name" => "description",
            "type" => "TEXT",
            "add" => ""
        ],
        [
            "name" => "contenu",
            "type" => "LONGTEXT",
            "add" => ""
        ],
        [
            "name" => "auteur_id",
            "type" => "INT",
            "add" => "NOT NULL"
        ],
        [
            "name" => "created_at",
            "type" => "TIMESTAMP",
            "add" => "DEFAULT CURRENT_TIMESTAMP"
        ]
    ];
    
    public function __construct() {
        parent::__construct();
    }
    
    public function up() {
        $this->create('article');
    }
}
```

**Exécution de la migration**
```php
// Dans index.php ou un script séparé
use App\CreateArticleTable;

$migration = new CreateArticleTable();
$migration->up();
```

### Système de routing

**routes/web.php**
```php
<?php
use App\Router;
use App\ArticleController;
use App\Auth;
use App\Guard;

$router = new Router();

// Instanciation des contrôleurs
$articleController = new ArticleController();
$auth = new Auth();
$guard = new Guard();

// Routes publiques
$router->get('/', 'home')
       ->get('/articles', [$articleController, 'index', 'articles'])
       ->get('/article/[i:id]', [$articleController, 'show', 'article-detail'])
       ->get('/login', 'auth/login')
       ->get('/register', 'auth/register');

// Routes protégées (avec guard)
$router->get('/admin', 'admin/dashboard', [$guard, 'canActivate'])
       ->get('/profile', 'user/profile', [$guard, 'canActivate']);

// Routes POST
$router->post('/login', [$auth, 'login', 'auth/login'])
       ->post('/register', [$auth, 'register', 'auth/register'])
       ->post('/article/create', [$articleController, 'store', 'articles'])
       ->post('/article/[i:id]/update', [$articleController, 'update', 'article-detail'])
       ->post('/article/[i:id]/delete', [$articleController, 'delete', 'articles']);
```

### Création de vues

#### 1. Génération automatique
```bash
framwork.bat
# Choisir l'option 3, puis entrer le nom de la vue
```


#### Protection CSRF

```php
<?php
namespace App;

class CSRF {
    
    /**
     * Générer un token CSRF
     */
    public function generateToken() {
        session_start();
        $token = bin2hex(random_bytes(35));
        $_SESSION['csrf_token'] = $token;
        
        return "<input type='hidden' name='csrf_token' value='" . $token . "'>";
    }
    
    /**
     * Vérifier le token CSRF
     */
    public function verifyToken($token) {
        session_start();
        
        if (!$token || !isset($_SESSION['csrf_token']) || 
            $token !== $_SESSION['csrf_token']) {
            http_response_code(403);
            die('Token CSRF invalide');
        }
        
        // Régénérer le token après utilisation
        unset($_SESSION['csrf_token']);
        return true;
    }
}
```

#### Guard d'authentification

```php
<?php
namespace App;

class Guard {
    
    /**
     * Vérifier si l'utilisateur est connecté
     */
    public function canActivate() {
        session_start();
        
        if (empty($_SESSION['user'])) {
            // Rediriger vers la page de connexion
            header('Location: ' . WORK_DIRECTORY . '/login');
            exit;
        }
        
        return true;
    }
    
    /**
     * Vérifier si l'utilisateur a un rôle spécifique
     */
    public function hasRole($role) {
        session_start();
        
        if (empty($_SESSION['user']) || $_SESSION['user']['role'] !== $role) {
            http_response_code(403);
            die('Accès refusé');
        }
        
        return true;
    }
}
```

### Utilisation du CLI

#### Sous Windows

```bash
# Lancer l'interface
framwork.bat

# Options disponibles :
# 1. Créer un modèle
# 2. Créer un contrôleur  
# 3. Créer une vue
# 4. À propos
```

## Configuration avancée

### Variables d'environnement

**config/app.php**
```php
<?php
return [
    'app_name' => 'Mon Framework PHP',
    'app_env' => 'development', // production, development, testing
    'app_debug' => true,
    'app_url' => 'http://localhost',
    'timezone' => 'Europe/Paris',
    
    // Configuration de session
    'session' => [
        'lifetime' => 120, // minutes
        'expire_on_close' => false,
        'cookie_secure' => false,
        'cookie_httponly' => true,
    ],
    
    // Configuration de sécurité
    'security' => [
        'hash_algo' => PASSWORD_DEFAULT,
        'csrf_protection' => true,
        'session_regenerate' => true,
    ]
];
```

## 🤝 Contribution

1. Forkez le projet
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/nouvelle-fonctionnalite`)
3. Committez vos changements (`git commit -am 'Ajout nouvelle fonctionnalité'`)
4. Poussez vers la branche (`git push origin feature/nouvelle-fonctionnalite`)
5. Ouvrez une Pull Request


## Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

---
