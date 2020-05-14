<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $fillable = [

        'libelle', 'cout', 'etat','temps'

    ];

    public function abonnements()
    {
    	return $this->hasMany('App\Abonnement');
    }

    public function historiques()
    {
        return $this->hasMany('App\Historique');
    }
}
