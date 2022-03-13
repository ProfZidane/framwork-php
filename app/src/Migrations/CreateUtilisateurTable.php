<?php

    namespace App;

    use App\Migration;

    class CreateUtilisateurTable extends Migration {

        protected $schema = [
            [
                "name" => "id",
                "type" => "INT",
                "add" => "PRIMARY KEY NOT NULL AUTO_INCREMENT"
            ],
            [
                "name" => "name",
                "type" => "VARCHAR(100)",
                "add" => ""
            ],
            [
                "name" => "email",
                "type" => "VARCHAR(50)",
                "add" => ""
            ],
            [
                "name" => "password",
                "type" => "VARCHAR(200)",
                "add" => ""
            ]
        ];

        public function __construct() {
            parent::__construct();
        }


        
        public function push($table_name) {
            $this->create($table_name);
        }
    }