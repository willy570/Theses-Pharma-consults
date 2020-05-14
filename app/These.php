<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Spatie\Searchable\Searchable;
//use Spatie\Searchable\SearchResult;


use Laravel\Scout\Searchable;

class These extends Model /*implements Searchable*/
{
    use Searchable;
    public $asYouType = true;

    protected $fillable = [
        'titre', 'auteur', 'resume', 'fichier', 'universite_id', 'ufr_id', 'department_id', 'discipline_id', 'annee', 'url', 'keywords'
    ];

    public function searchableAs()
    {
        return 'theses_index';
    }

    /*public function getSearchResult(): SearchResult
    {
        $search = new SearchResult(
            $this,
            $this->titre,
            $this->url,
            $this->keywords
        );
        return $search;
    }
    */

     /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
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
        return $this->belongsTo('App\Discipline', 'discipline_id');
    }

    public function departments()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function lignes()
    {
        return $this->hasMany('App\Ligne');
    }
}
