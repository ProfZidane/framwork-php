<?php

    namespace App;

    
    class CSRF {
        
        public function __construct() {

        }


        public function generateToken() {
            $token =  bin2hex(random_bytes(35));
            return "<input type='hidden' name='token' value='" . $token . "'>";
        }


        public function verifyToken($token) {
            if (!$token || $token != $_SESSION['token']) {
                header($_SERVER['SERVER_PROTOCOL'] . '405 not allowed');
                exit;
            }
            return 200;
        }


        
    }