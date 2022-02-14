<?php

    namespace App;
    use App\Database;
        

    class Model extends Database {

        protected $fillable;
        private $connexion;

        public function __contruct() {
            parent::__contruct();
            
            // $this->connexion = $this->getPDO();
            
        }


        public function save($array_value) {
            $div = explode("\\", get_class($this));
            $table_name =  strtolower($div[count($div) - 1]);

            $table = $table_name . "(";
            $value_table = "(";

            
            for ($i = 0; $i < count($this->fillable); $i++) {
                if ($i == count($this->fillable)-1) {
                    $table = $table . $this->fillable[$i];
                } else {
                    $table = $table . $this->fillable[$i] . ",";
                }
                
            }

            for ($i = 0; $i < count($array_value); $i++) {
                if ($i == count($array_value)-1) {
                    $value_table = $value_table . "'$array_value[$i]'";
                } else {
                    $value_table = $value_table . "'$array_value[$i]'" . ",";
                }
                
            }

            $table = $table . ")";
            $value_table = $value_table . ")";

            $this->connexion = $this->getPDO();
            

            $sql = "INSERT INTO " . $table . " VALUES " . $value_table;
            $req = $this->connexion->prepare($sql);

            $req->execute();
            
            // echo "Requete excecute !";            

        }


        public function get() {
            
            // echo get_class($this);
            $div = explode("\\", get_class($this));
            $table_name =  strtolower($div[count($div) - 1]);

            // echo $table_name;

            $numargs = func_num_args();
            // echo "Nombre d'arguments : $numargs\n";

            $indique = "";

            if ($numargs != 0) {                
                // echo "<br>";
                $args = func_get_args();

                for ($j=0; $j < count($args); $j++) { 
                    # code...
                    // echo "Arg " . $j . " " . $args[$j];
                    $indique .= $args[$j];

                    if ($j != count($args)-1) {
                        $indique .= ",";
                    }
                }
            } else {
                $indique = "*";
            }

            $sql = "SELECT " . $indique . " FROM " . $table_name;

            // echo $sql;

            $req = $this->requestSQL($sql);

            $datas = $req->fetchAll();

            return $datas;

            
        }


        /**
         * Pour les strings, faire en plus des doubles côtes, le single quotes ''
         */

        public function where($attr, $attr_value) { 
            $div = explode("\\", get_class($this));
            $table_name =  strtolower($div[count($div) - 1]);

            $sql = "SELECT * FROM " . $table_name . " WHERE " . $attr . " = " . $attr_value;

            $req = $this->requestSQL($sql);

            $datas = $req->fetchAll();

            return $datas;
            
        }




        public function pop($id) {
            $div = explode("\\", get_class($this));
            $table_name =  strtolower($div[count($div) - 1]);

            $sql = "DELETE FROM " . $table_name . " WHERE id = " . $id;

            $req = $this->requestSQL($sql);

            return $req;

        }


        /**
         * Pour les strings, faire en plus des doubles côtes, le single quotes ''
         */


        public function change($id,$attr,$attr_value) {
            $div = explode("\\", get_class($this));
            $table_name =  strtolower($div[count($div) - 1]);

            $sql = "UPDATE " . $table_name . " SET " . $attr . " = " . $attr_value . " WHERE id = " . $id;

            $req = $this->requestSQL($sql);

            return $req;
        }



    }