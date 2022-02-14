<?php

    
    namespace App;


    class Route {

        public static $routes = array();
        

        public function __construct() {

        }

        public static function addRoute($path, $page) {

            // var_dump((Route::$routes));
            // echo "<br>";

            $element = [
                "path" => $path,
                "page" => $page,
                "mount" => False
            ];
            
            

            // echo Route::$routes[0]["path"];
            // echo $element["path"];

            array_push(Route::$routes, $element);

        }

        public static function get($path, $page) {            
            
            $query = $_SERVER['QUERY_STRING'];
            // echo $query; // Outputs: Query String
            
            $query = explode("=", $query);            

            var_dump($query);

            $e = explode("/", $query[count($query)-1]);
            echo "<br>";
            var_dump($e);
            echo "<br>";

            $query = $query[count($query)-1];
            
            $elementExist = 0;

            echo "<br>";
            echo "1er : ";
            echo $elementExist;
            echo "<br>";

            Route::addRoute($path, $page);

            // echo $query;
           

            for ($i=0; $i < count(Route::$routes); $i++) { 
                # code...
                 
                if ((Route::$routes[$i]['path'] == $query) && (Route::$routes[$i]["mount"] == False )) {
                    // var_dump(Route::$routes[$i]);
                    // echo 'link';
                    $elementExist = 1;
                    Route::$routes[$i]["mount"] = True;
                    
                    include_once( __DIR__ . '/../ressources/views/layouts/header.php');

                    require_once __DIR__ . '/../ressources/views/' . Route::$routes[$i]['page'];

                    include_once(__DIR__ . '/../ressources/views/layouts/footer.php');
                } else {
                    $elementExist = 0;
                    Route::$routes[$i]["mount"] = False;
                }
            }
            
            echo "<br>";
            echo $elementExist;
            echo "<br>";

            /* if ($elementExist == 0) {
                include_once( __DIR__ . '/../ressources/views/layouts/header.php');
                require_once __DIR__ . '/../ressources/views/error.php';
                include_once(__DIR__ . '/../ressources/views/layouts/footer.php');
            } */
                                    
        }


        public function post() {

        }


    }