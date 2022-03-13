<?php

    namespace App;


    class Controller {
        
        protected $request;

        public function __construct() {
            
            if ($_POST) {

                $this->request = $_POST;
                
            }
            
            
        }


        
    }