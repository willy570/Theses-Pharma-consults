<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ufr extends Model
{
    protected $fillable = [
        'libelle', 'universite_id'
    ];


    public function universites()
    {
    	return $this->belongsTo('App\Universite', 'universite_id');
    }

    public function departments()
    {
    	return $this->hasMany('App\Department');
    }

    public function theses()
    {
        return $this->hasMany('App\These');
    }
}
