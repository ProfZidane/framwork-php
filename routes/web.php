<?php
    
// require("vendor/autoload.php");
// require("app/Autoloader.php");

    use App\VoitureController;
    use App\Router;
    use App\UtilisateursController;
    use App\Auth;
    use App\Guard;

    // Set base path if project is change directory's base (on app/Router of course)
    $router = new App\Router();


    // Usage's Controller
    $voiture = new App\VoitureController();
    $user = new App\UtilisateursController();
    $auth = new App\Auth();
    $guard = new App\Guard();

    // Define routes
    $router->get("/[i:id]", [$user, 'have', 'home'])
          ->get('/', 'home')
          ->get('/home', 'main', [$guard, 'canActivate'])
          ->get("/user", "article", [$guard, 'canActivate'])   
          ->get("/blog", "blog")
          ->get("/auth", "form")
          ->get('/login', 'login')
          ->post("/createUser", [ $user, 'store', 'article'])
          ->post('/register', [ $auth, 'register', 'form' ])
          ->post('/login', [ $auth, 'login', 'login'])
          ->post('/logout', [ $auth, 'logout', 'login']);

