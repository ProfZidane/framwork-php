<?php

    namespace App;


    class Command  {


        public function run(array $args) {

            $name = "My mini framworks";

            if (isset($args[1])) {
                $name = $args[1];
            }

            echo $name;
        }


    }