<?php

    namespace App;
    
    use App\Controller; 
    use App\Utilisateurs;
    

    class Auth extends Controller {

        public function __construct() {
            parent::__construct();
        }


        public function register() {
            $user = new Utilisateurs();
            $ifUserExist = $user->where('email', $this->request['email']);
            // var_dump($this->request);
            if (!(empty($ifUserExist))) {
                return null;
            } else {
                $this->request['password'] = password_hash($this->request['password'], PASSWORD_DEFAULT);
                $user->save($this->request);
                return true;
            }
            
        }


        public function login() {
            $user = new Utilisateurs();
            $user_data = $user->where('email', $this->request['email']);
            if (!(empty($user_data))) {
                // echo "This user exist";
                // var_dump($user_data);
                if (password_verify($this->request['password'], $user_data[0]['password'])) {
                    //echo "Vous etes connecte";
                    session_start();
                    $_SESSION['user'] = $user_data[0];
                    return true;
                }
            }
            return 403;
        }



        public function logout() {
            // echo "deconnexion";
            session_start();
            $_SESSION = array();
            session_destroy();
            return 300;
        }


    }