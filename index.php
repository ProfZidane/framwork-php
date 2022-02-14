
<?php

define("WORK_DIRECTORY", "/php");


    require 'app/Autoloader.php';  // chargement de l'autoloader
    App\Autoloader::register(); // utiliser la méthode register() de l'autoloader
    require("routes/web.php");

    //require("routes/web.php");
    // require("ressources/views/home.php");

    //require('config/db/db.config.php');

    


   // $db = new App\Database();

    // $db->getPDO();


    // $voiture = new App\Voiture();
    // $conducteur = new App\Conducteur();
   // 
   // $voiture = new App\VoitureController();
   // $user = new App\UtilisateursController();

    // $user->store();
   // $user->update();
     // $voiture->have();

   // echo "<br>";

    // $voiture->fillable->designation = "popo";
    // $voiture->save(['Ma voiture rouge', 'MOMOP4525P', 'Rouge', 4]);

    // var_dump($db);






?>

    
