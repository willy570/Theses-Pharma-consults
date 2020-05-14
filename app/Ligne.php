<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ligne extends Model
{
    protected $fillable = ['user_id', 'bibliotheque_id', 'etat', 'these_id'];


    public function users()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function bibliotheques()
    {
    	return $this->belongsTo('App\Bibliotheque', 'bibliotheque_id');
    }

    public function theses()
    {
    	return $this-> belongsTo('App\These', 'these_id');
    }

}
