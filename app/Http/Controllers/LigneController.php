<?php

namespace App\Http\Controllers;

use App\Ligne;
use App\Bibliotheque;
use Illuminate\Http\Request;

class LigneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $state = "";
        $message = "";

       if ($request->ajax()) {
        $dataExisting = new Ligne;
        $__olddata = $dataExisting->where('bibliotheque_id', $request->lib)
                                    ->where('user_id', $request->_su)
                                    ->where('these_id', $request->_tu)
                                    ->count();
            if ($__olddata == 0) {
               try {
                $saved = Ligne::create([
                    'bibliotheque_id'=>$request->lib,
                    'user_id'=>$request->_su,
                    'these_id'=>$request->_tu,
                    ]);
                $state  = "success";
                $message = "Document ajouté à votre bibliothèque";
                } catch (Exception $e) {
                    $state  = 'error';
                    $message = $e;
                }
            } 
            else {
                 $state  = "error";
                $message = "Vous aviez déjà ajouté ce document dans cette bibliothèque";
            }
            
        }
        else{
             abort(404);
        } 
    // return
    return response()->json(['state' => $state, 'message' => $message]);
    }

    public function operation(Request $request)
    {
        $state = "";
        $message = "";

       if ($request->ajax()) {
        $dataExisting = new Bibliotheque;
        $__olddata = $dataExisting->where('libelle', $request->biblioname)
                                    ->where('user_id', $request->_su)
                                    ->count();
            if ($__olddata == 0) {
               try {

                $saved = Bibliotheque::create([
                    'libelle'=>$request->biblioname,
                    'user_id'=>$request->_su
                ]);

                if ($saved) {
                    Ligne::create([
                        'bibliotheque_id'=> $saved->id,
                        'user_id'=> $request->_su,
                        'these_id'=>$request->_tu,
                    ]);
                } 
                $state  = "success";
                $message = "Document ajouté à votre bibliothèque";
                } catch (Exception $e) {
                    $state  = 'error';
                    $message = $e;
                }
            }
            else {
                 $state  = "error";
                $message = "Vous aviez déjà ajouté ce document dans cette bibliothèque";
            }
            
        }
        else{
             abort(404);
        } 
    // return
    return response()->json(['state' => $state, 'message' => $message]);
    }
       

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function show(Ligne $ligne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function edit(Ligne $ligne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ligne $ligne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ligne $ligne)
    {
        //
    }
}
