<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    protected $fillable = [
        'denomination', 'sigle', 'ville', 'phone', 'email', 'description', 'pays', 'logo'
    ];

    public function ufrs()
    {
    	return $this->hasMany('App\Ufr');
    }

    public function theses()
    {
    	return $this->hasMany('App\These');
    }

}
