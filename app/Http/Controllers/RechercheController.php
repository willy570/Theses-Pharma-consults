<?php

namespace App\Http\Controllers;

//use Search;
//use Spatie\Searchable\Search;
//use Spatie\Searchable\ModelSearchAspect;

use App\Department;
use App\Bibliotheque;
use App\These;
use App\Discipline;
use App\Universite;
use Illuminate\Http\Request;
use CinetPay\CinetPay;
use Illuminate\Support\Facades\DB;


class RechercheController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.item-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show($offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit($offre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $offre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy($offre)
    {
        //
    }



    public function searchDocs(Request $request)
    {
        $query = $request->q;
        $terms = strtoupper($query);
        /*$theses = new These;
          $theses = $theses->where('titre', 'LIKE', '%'.$terms.'%')->Orwhere('keywords', 'LIKE', '%'.$query.'%');
        $SearchResults = $theses->get();*/
        $SearchResults = These::search($terms)->get();
        //dd($SearchResults);

       
       return view('front.item-list', compact('SearchResults', 'query'));
    }
            

    


    public function allThese(These $these)
    {
        $universities = Universite::pluck('denomination', 'id');
        $departments = Department::pluck('libelle', 'id');
        $disciplines = Discipline::pluck('libelle', 'id');
        $results = these::orderBy('id', 'DESC')->paginate(10);
        return view('front.all-these', compact('results', 'universities', 'departments', 'disciplines'));
    }


    public function details(These $these, $url)
    {
        $results = These::where('url', $url)->first();
        $_keywordsTable = [];
        if ($results->keywords) {
            $x = 0;
            $keywordsText = $results->keywords;
            $_SingleKeywordsText = explode(" ", $keywordsText);
            foreach ($_SingleKeywordsText as $value) {
                $x++;
                array_push($_keywordsTable, $value);
            }
        }
        return view('front.item-detail', compact('results', '_keywordsTable'));
    }


    public function filter(These $these, Request $request)
    {
        $school = $request->get('university');
        $department = $request->get('departments');
        $discipline = $request->get('disciplines');

        $u = Universite::where('id', $school)->first('denomination');
        $d = Department::where('id', $department)->first('libelle');
        $ds = Discipline::where('id', $discipline)->first();
        $results = $these::where('universite_id', $school)
        ->where('department_id', $department)
        ->where('discipline_id', $discipline)
        ->get();
            
        return view('front.result', compact('ds','d','u','results'));

    }


    public function modalLibraries(Request $request)
    {
        $userID = $request->id;
        $theseID = $request->item;
        try {
         $library = 
            Bibliotheque::where('user_id', $userID)
                ->orderBy('id','desc')
                ->pluck('libelle', 'id');
        } catch (Exception $e) {
            return view('front.addToLibrary', compact('e'));
        }
        return view('front.addToLibrary', compact('library', 'theseID'));
    }

    /*public function addLigne(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
            'lib' => 'required',
            ]);
            // Gestion des données
            dd($request);
            if (isset('_token') && $request->ajax()) {
                try {
                    dd($request);
                    
                } catch (Exception $e) {
                    
                }
            }

            //back
            return response()->json(['success'=>'document added successfully.']);
        }
        abort(404);
    }*/
}
