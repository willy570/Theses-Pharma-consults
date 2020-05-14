<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Department extends Model
{
   

    protected $fillable = [
        'libelle', 'universite_id', 'ufr_id'
    ];

    public function getListLibelle()
    {
        return Department::pluck('libelle', 'id');
    }

    public function universites()
    {
    	return $this->belongsTo('App\Universite', 'universite_id');
    }

    public function ufrs()
    {
    	return $this->belongsTo('App\Ufr', 'ufr_id');
    }

    public function disciplines()
    {
        return $this->hasMany('App\Discipline');
    }
}
