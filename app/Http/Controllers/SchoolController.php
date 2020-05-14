<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use App\Http\Requests\schoolRequest;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(School $model)
    {
        return view('layouts.admin.universites.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.universites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(schoolRequest $request)
    {
         $valided = $request->validated();
        
            if ($files = $request->file('logo')) {
                $destinationPath = 'public/uploads/'; // upload path
                $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profilefile);
                $insert['file'] = "$profilefile";
            }
    
            $datas = [
                'denomination' =>$request->get('university-name'),
                'sigle'=>$request->get('university-sigle'),
                'ville'=>$request->get('university-city-location'),
                'phone'=>$request->get('university-phone'), 
                'email'=>$request->get('university-email'), 
                'description'=>$request->get('exampleFormControlTextarea1'), 
                'pays'=>$request->get('university-country-location'), 
                'logo'=>$insert
            ];

            $model = new School;
            $saved = $model->saved($datas);

            if ($saved) {
               return redirect()->route('layouts.admin.universites.index')->withStatus(__('Université enregistrée avec succès !'));
            }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }
}
