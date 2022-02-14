<?php

    namespace App;

    use App\Database;


    class Migration extends Database {

        protected $schema;

        public function __construct() {
            parent::__construct();
        }


        public function create($table_name) {
            /* echo $table_name;
            var_dump($this->schema);
            echo "<br>"; */

            $array_table = "(";

            for ($i=0; $i < count($this->schema); $i++) { 
                # code...
                foreach ($this->schema[$i] as $key => $value) {
                    # code...
                    $array_table .= $value . " ";
                }
                
                if ($i !== count($this->schema)-1) {
                    $array_table .= ", ";
                }
            }

            $array_table .= ")";


            // echo $array_table;

            $this->createTable($table_name, $array_table);

        }

    }