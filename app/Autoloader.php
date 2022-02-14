<?php
namespace App;
/**
 * Class Autoloader
 * @package Tutoriel
 */
class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
        
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class){
        if (strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            $paths = array(            
                join(DIRECTORY_SEPARATOR, [__DIR__]),                                           
                join(DIRECTORY_SEPARATOR, [__DIR__, 'src', 'Models']),
                join(DIRECTORY_SEPARATOR, [__DIR__, 'src', 'Migrations']),
                join(DIRECTORY_SEPARATOR, [__DIR__, 'src', 'Controllers'])                
            );

            foreach($paths as $path){            
                $file = join(DIRECTORY_SEPARATOR, [$path, $class.'.php']) ;   
                // echo $file . "<br>";         
                if(file_exists($file)) {
                    return require $file;            
                }                                 
            }

            // require __DIR__.'/' . $class . '.php';
        }
    }

}