<?php

    namespace App;

    require('config/db/db.config.php');

    use \PDO;
        

    class Database {

        private $db_name;
        private $db_user;
        private $db_password;
        private $db_host;
        private $connexion;

        public function __construct() {
            $this->db_name = $_ENV["DB_DATABASE"];
            $this->db_user = $_ENV['DB_USERNAME'];
            $this->db_password = $_ENV["DB_PASSWORD"];
            $this->db_host = $_ENV["DB_HOST"];
        }

        public function getPDO(){            
            if ($this->connexion === null) {
                # code...
                $connexion = new PDO("mysql:dbname=" . $this->db_name . ";host=" . $this->db_host . "",$this->db_user,$this->db_password);
                $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->connexion = $connexion;
                
                // echo "connected";
            }
            return $this->connexion; 
        }


        public function createTable($table_name, $attr_array) {
            $sql = "CREATE TABLE " . $table_name . " " . $attr_array;
            $req = $this->getPDO()->query($sql);
            echo "Table " . $table_name . " crée";
        }


        public function requestSQL($sql) {
            $req = $this->getPDO()->prepare($sql);
            $req->execute();

            return $req;
        }


        /* public function get() {
            $req = this->getPDO()->query("SELECT * FROM " . this->db_name);
        } */
    }