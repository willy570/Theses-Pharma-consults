<?php

namespace App\Http\Controllers;

use App\Department;
use App\Universite;
use App\Ufr;
use Illuminate\Http\Request;
use App\Http\Requests\disciplineRequest;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate(10);
        $nb = Department::all();
        $stat = $nb->count();
        return view('layouts.admin.departement.index', compact('departments', 'stat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $university = Universite::pluck('denomination', 'id');
        $ufrs = Ufr::pluck('libelle', 'id');
        return view('layouts.admin.departement.create', compact('university', 'ufrs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(disciplineRequest $request)
    {
         $valided = $request->validated();
         if ($valided && $request->get('_token')) {

             $datas = [
                'libelle' =>$request->get('departement-name'), 
                'universite_id' => $request->get('university-name'), 
                'ufr_id' =>$request->get('university-ufr'), 
            ];

              $saved = Department::create($datas);

         }

        if ($saved) {
           return redirect()->route('departement.home')->withStatus(__('Departement enregistré avec succès !'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Department $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $departement)
    {
        $university = Universite::pluck('denomination', 'id');
        $ufrs = Ufr::pluck('libelle', 'id');
        return view('layouts.admin.departement.edit', compact('departement','university', 'ufrs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(disciplineRequest $request, Department $departement)
    {
        $valided = $request->validated();
         if ($valided && $request->get('_token')) {

             $datas = [
                'libelle' =>$request->get('departement-name'), 
                'universite_id' => $request->get('university-name'), 
                'ufr_id' =>$request->get('university-ufr'), 
            ];

              $saved = $departement::where('id', $request->departement_id)->update($datas);

         }

        if ($saved) {
           return redirect()->route('departement.home')->withStatus(__('Modification effectuée avec succès !'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $departement, $id)
    {
        $deleted = $departement->where('id',$id)->delete();
        
        // check data deleted or not
        if ($deleted == 1) {
            $success = true;
            $message = "Opération effectuée avec succès !";
        } else {
            $success = true;
            $message = "Erreur survenue, réeassayer svp";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
