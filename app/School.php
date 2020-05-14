<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'denomination', 'sigle', 'ville', 'phone', 'email', 'description', 'pays', 'logo'
    ];

}
