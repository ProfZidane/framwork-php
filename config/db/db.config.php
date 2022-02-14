<?php 



    $config = [

        "DB_HOST" => "127.0.0.1",
        "DB_PORT" => 3306,
        "DB_DATABASE" => "bac",
        "DB_USERNAME" => "root",
        "DB_PASSWORD" => ""

    ];



    foreach ($config as $key => $value) {
        # code...         

        $_ENV[$key] = $value;

    }

    

