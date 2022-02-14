<?php

    namespace App;

    use App\Controller;
    use App\Voiture;

    class VoitureController extends Controller {

        public function __contruct() {
            parent::__contruct();
        }


        public function index() {
            return "voiture";
        }

        
        public function have($id) {
            $voiture = new Voiture();
            return $voiture->where('id', $id);
        }


        public function store() {
            $voiture = new Voiture();
            $voiture->save(['Ma voiture blue', 'BLUUE5P9021Z', 'Bleu', 1]);
        }


        public function update() {

        }


        public function delete() {

        }
    }