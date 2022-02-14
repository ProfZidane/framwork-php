<?php

    require('db.config.php');

    $serveur = $_ENV['DB_HOST'];
    $db_name = $_ENV["DB_DATABASE"];
    $login = $_ENV["DB_USERNAME"];
    $pass = $_ENV["DB_PASSWORD"];

    

    try{

        $connexion= new PDO("mysql:host=$serveur;dbname=$db_name", $login,$pass);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  

        echo "Connected";

    }
    catch(PDOException $e){
        echo'Echec de la connexion :'.$e->getMessage();
    }

