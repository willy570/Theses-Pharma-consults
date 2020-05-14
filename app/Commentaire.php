<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    

	 protected $fillable = [

        'demande_id', 'comment'

    ];



    public function demandes()
    {
    	return $this->belongsTo('App\Demande', 'demande_id');
    }
}
