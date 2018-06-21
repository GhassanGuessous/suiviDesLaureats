<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateurs extends Model
{
    protected $fillable = [

    	'cne',
    	'nom',
    	'prenom',
        'date_naissance',
        'email',
        'promo',
        'login',
        'password',
        'filiere_id',
        'status_id'
    ];
}
