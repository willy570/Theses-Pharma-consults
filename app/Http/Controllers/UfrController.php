<?php

namespace App\Http\Controllers;

use App\Ufr;
use App\Universite;
use Illuminate\Http\Request;
use App\Http\Requests\ufrRequest;

class UfrController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ufrs = Ufr::paginate(6);
        return view('layouts.admin.ufr.index', compact('ufrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $university = Universite::pluck('denomination', 'id');
        return view('layouts.admin.ufr.create', compact('university'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ufrRequest $request)
    {
         $valided = $request->validated();
         //dd($request->get('university-name'));
         if ($valided && $request->get('_token')) {
             $datas = ['libelle' =>$request->get('ufr-name'), 'universite_id' => $request->get('university-name')];

              $saved = Ufr::create($datas);

         }

        if ($saved) {
           return redirect()->route('ufr.home')->withStatus(__('Urf enregistrée avec succès !'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ufr  $ufr
     * @return \Illuminate\Http\Response
     */
    public function show(Ufr $ufr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ufr  $ufr
     * @return \Illuminate\Http\Response
     */
    public function edit(Ufr $ufr)
    {   
         $university = Universite::pluck('denomination', 'id');
         return view('layouts.admin.ufr.edit', compact('ufr', 'university'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discipline  $ufr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ufr $ufr)
    {
        $data = [];
        //dd($request);
        if ($request->university_name) {
            $data = ['libelle'=>$request->ufr_name, 'universite_id'=>$request->university_name];
        }else{
            $data = ['libelle'=>$request->ufr_name];
        }
        $response = $ufr->where('id', $request->_id)->update($data);

        return redirect()->route('ufr.home')->withStatus(__('Mise à jour effectuée avec succès!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ufr  $ufr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ufr $ufr, $id)
    {
        $deleted = $ufr->where('id',$id)->delete();
        
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
