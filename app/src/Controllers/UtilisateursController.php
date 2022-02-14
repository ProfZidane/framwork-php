<?php

    namespace App;

    use App\Controller;
    use App\Utilisateurs;

    class UtilisateursController extends Controller {

        public function __contruct() {
            parent::__contruct();
        }


        public function index() {

        }

        
        public function have($id) {
            $user = new Utilisateurs();
            /* $user_response = $user->get();   
            var_dump($user_response); */
            $user_response = $user->where('id', $id);
            return $user_response;
        }


        public function store($datas) {
            $user = new Utilisateurs();
            // echo $datas;
            // var_dump($datas);
            $user->save($datas);

            return "Utilisateur créé";
        }


        public function update() {
            $user = new Utilisateurs();
            $user->change(2,'name',"'Robert kiyo'");

        }


        public function delete() {
            $user = new Utilisateurs();
            $user->pop(3);
        }

    }