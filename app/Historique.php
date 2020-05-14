<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    protected $fillable = [

        'user_id', 'offre_id', '_dateabonnement', '_dateexpirationabonnement', 'operateur', 'numero_operation'
    ];

    public function offres()
    {
    	return $this-> belongsTo('App\Offre', 'offre_id');
    }

    public function users()
    {
    	return $this-> belongsTo('App\User', 'user_id');
    }
}
