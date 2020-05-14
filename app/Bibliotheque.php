<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibliotheque extends Model
{
        protected $fillable = [

        'libelle', 'disponiblite', 'user_id'

    ];

    public function lignes()
    {
    	return $this->hasMany('App\Ligne');
    }
}
