<?php

    namespace App;
    
    use App\Model;


    class Voiture extends Model {

        protected $fillable = [
            'designation',
            'immatriculation',
            'couleur',
            'nbrPlace'
        ];

    }