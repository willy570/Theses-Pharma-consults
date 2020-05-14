<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class University extends Model
{
	public $table = 'universties';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'denomination', 'sigle', 'ville', 'phone', 'email', 'description', 'pays', 'logo'
    ];

    /*public function save(Array $datas)
    {
    	//saving request data
    	University::create($datas);
	}*/

}
