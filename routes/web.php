<?php
    
// require("vendor/autoload.php");
// require("app/Autoloader.php");

    use App\VoitureController;
    use App\Router;
    use App\UtilisateursController;


    // Set base path if project is change directory's base (on app/Router of course)
    $router = new App\Router();


    // Usage's Controller
    $voiture = new App\VoitureController();
    $user = new App\UtilisateursController();


    // Define routes
    $router->get("/[i:id]", [$user, 'have', 'home'])
          ->get("/user", "article")   
          ->get("/blog", "blog")
          ->post("/createUser", [ $user, 'store', 'article']);

