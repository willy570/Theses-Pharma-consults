<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable = [
        'libelle', 'department_id'
    ];

    public function departments()
    {
    	return $this->belongsTo('App\Department', 'department_id');
    }

    public function theses()
    {
        return $this->hasMany('App\These');
    }


}
