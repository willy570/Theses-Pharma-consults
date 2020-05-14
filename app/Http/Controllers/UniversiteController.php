<?php

namespace App\Http\Controllers;

use App\Universite;
use Illuminate\Http\Request;
use App\Http\Requests\UniversiteRequest;

class UniversiteController extends Controller
{

    public $logo, $logo_file = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = Universite::all();
        return view('layouts.admin.universites.index', compact('universities'));
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
    public function store(UniversiteRequest $request)
    {
        
        $valided = $request->validated();
        if ($valided) {
        
            if ($files = $request->file('logo')) {
                $destinationPath = 'public/uploads/'; // upload path
                $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profilefile);
                $insert['file'] = $profilefile;
            }
    
            $datas = [
                'denomination' =>$request->get('university-name'),
                'sigle'=>$request->get('university-sigle'),
                'ville'=>$request->get('university-city-location'),
                'phone'=>$request->get('university-phone'), 
                'email'=>$request->get('university-email'), 
                'description'=>$request->get('exampleFormControlTextarea1'), 
                'pays'=>$request->get('university-country-location'), 
                'logo'=>$insert['file']
            ];

            //$model = new Universite;
                $saved = Universite::create($datas);

            if ($saved) {
               return redirect()->route('university.home')->withStatus(__('Université enregistrée avec succès !'));
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Universite  $universite
     * @return \Illuminate\Http\Response
     */
    public function show(Universite $universite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Universite  $universite
     * @return \Illuminate\Http\Response
     */
    public function edit(Universite $universite)
    {
        return view('layouts.admin.universites.edit', compact('universite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Universite  $universite
     * @return \Illuminate\Http\Response
     */
    public function update(UniversiteRequest $request, Universite $universite)
    {
        $valided = $request->validated();
        if ($valided) {
        
            if ($files = $request->file('logo')) {
                $destinationPath = 'public/uploads/'; // upload path
                $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profilefile);
                $insert['file'] = $profilefile;
            }
    
            $datas = [
                'denomination' =>$request->get('university-name'),
                'sigle'=>$request->get('university-sigle'),
                'ville'=>$request->get('university-city-location'),
                'phone'=>$request->get('university-phone'), 
                'email'=>$request->get('university-email'), 
                'description'=>$request->get('exampleFormControlTextarea1'), 
                'pays'=>$request->get('university-country-location'), 
                'logo'=>$insert['file']
            ];

            $response = $universite::where('id', $request->university_id)->update($datas);
            if ($response ==1) {
               return redirect()->route('university.home')->withStatus(__('Mise à jour effectuée avec succès !')); 
            }else{
               return redirect()->route('university.home')->withStatus(__('Erreur survenue lors de la mise à jour !'));  
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Universite  $universite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Universite $universite, $id)
    {
        $deleted = $universite->where('id',$id)->delete();
        
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
