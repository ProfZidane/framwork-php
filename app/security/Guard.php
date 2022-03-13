<?php

    namespace App;


    class Guard {

        public function __construct() {

        }


        public function canActivate() {
            // session_start();
            
            if ( (!empty($_SESSION['user'])) ) {
                return true;
            }

            return false;
        }
    }