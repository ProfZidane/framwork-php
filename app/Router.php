<?php

namespace App;

require("vendor/autoload.php");

use AltoRouter;

    class Router  {

        
        private $routerAlto;


        public function __construct() {
            //parent::__construct();            
            $this->routerAlto = new AltoRouter();
            $this->routerAlto->setBasePath('php/');
            
        }


        // Remettre lancien get
        public function get($route, $target, $guard=null) {

            

            $this->routerAlto->map('GET', $route, $target);

            $match = $this->routerAlto->match();

            if ($guard !== null) {
                // var_dump($guard);
                $result = call_user_func_array(array($guard[0], $guard[1]), array());
                
                if ($result !== true) {
                    // echo "d";
                    session_start();
                    $_SESSION = array();
                    session_destroy();
                    // header("Location: ", true, 200);
                    header('Location: http://localhost/php/', true);                    
                    exit;
                }

                

                
            }

            // var_dump($match);

            // $list = explode("#", $match['target']);

            // var_dump($list);

            // verifie si c un tableau
             if (is_array($match['target'])) {
                

                $array_params = array();

                // verifie si ya des parametres
                if (count($match['params']) !== 0) {

                    // var_dump($match['params']);
                    // matchage des parametres
                    foreach ($match['params'] as $key => $value) {
                        # code...
                        array_push($array_params,$value);
                    }

                    // var_dump($array_params);
                    
                    ob_start();
                    $result = call_user_func_array(array($match['target'][0], $match['target'][1]), $array_params);    
                    require_once __DIR__ . "/../ressources/views/{$match['target'][2]}.php";
                    $content = ob_get_clean();
                    require __DIR__ . "/../ressources/views/layouts/app.php";
                    
                    exit;
                } else {

                    //sinon execution directe
                    $result = call_user_func_array(array($match['target'][0], $match['target'][1]), array());
                    // var_dump($result);
                    require_once __DIR__ . "/../ressources/views/{$match['target'][2]}.php";
                    $content = ob_get_clean();
                    require __DIR__ . "/../ressources/views/layouts/app.php";
                    

                }
                
                exit;

            } else if ((is_array($match)) && ($match != null)) {

                // ou sinon juste envoyer la page 
                if (is_callable($match['target'])) {
                    call_user_func_array($match['target'], $match['params']);
                } else {
                    ob_start();
                    $params = $match['params'];
                    require_once __DIR__ . "/../ressources/views/{$match['target']}.php";
                    $content = ob_get_clean();
                    require __DIR__ . "/../ressources/views/layouts/app.php";
                }

                exit;
            }

            

            return $this;


        }




        public function post($route, $target) {
            $this->routerAlto->map("POST", $route, $target);
            $match = $this->routerAlto->match();
            // var_dump($match);
            // echo "<br>";
            // var_dump($_POST);

            if (is_array($match['target'])) {

                // liste des data
                $array_data = array();
                $true_array = [];

                /* foreach ($_POST as $key => $value) {
                    # code...
                    array_push($array_data, $value);
                }

                array_push($true_array, $array_data);
                var_dump($array_data); */
                // echo "<br>";
                
                ob_start();
                $result = call_user_func_array(array($match['target'][0], $match['target'][1]), array());
                require_once __DIR__ . "/../ressources/views/{$match['target'][2]}.php";
                $content = ob_get_clean();
                require __DIR__ . "/../ressources/views/layouts/app.php";
                // $this->generate('user');
                /* ob_start();
                $result = call_user_func_array(array($match['target'][0], $match['target'][1]), $true_array);    
                require_once __DIR__ . "/../ressources/views/{$match['target'][2]}.php";
                $content = ob_get_clean();
                require __DIR__ . "/../ressources/views/layouts/app.php"; */

                exit;
            } 


            // exit;
            return $this;
            
        }


        public function generate($url, $params=[]) {

            if (count($params) <= 0) {
                $this->routerAlto->generate($url);
            } else {
                $this->routerAlto->generate($url, $params);
            }
            
        }

        public static function run($match) {


        }
    }