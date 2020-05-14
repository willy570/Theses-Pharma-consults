<?php

namespace App\Http\Controllers;

use App\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Offre::paginate(6);
        return view('layouts.admin.offres.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.offres.create');
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

        $dataExisting = new Offre;
        $__olddata = $dataExisting->where('libelle', $request->lblplan)
                                    ->where('cout', $request->planmount)
                                    ->count();
            if ($__olddata == 0) {
               try {

                $saved = Offre::create([
                    'libelle'=>$request->lblplan,
                    'cout'=>$request->planmount,
                    'temps'=>$request->temps,
                ]);

                $state  = "success";
                $message = "Offre créer avec succès !";
                } catch (Exception $e) {
                    $state  = 'error';
                    $message = $e;
                }
            }
            else {
                 $state  = "error";
                $message = "Ces données existent déjà";
            }
            
        if ($saved) {
           return redirect()->route('offres.home')->withStatus(__('Offre enregistré avec succès!'));
        }else{
            return redirect()->route('offres.home')->withStatus(__('Donnée déjà existante'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit(Offre $offre)
    {
        return view('layouts.admin.offres.edit', compact('offre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offre $offre)
    {
        $data = [];
        if ($request->temps) {
            $data = ['libelle'=>$request->lblplan, 'cout'=>$request->planmount, 'temps'=>$request->temps];
        }else{
            $data = ['libelle'=>$request->lblplan, 'cout'=>$request->planmount];
        }
        $response = $offre->where('id', $request->_id)->update($data);

        return redirect()->route('offres.home')->withStatus(__('Modification effectuée!'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $offre, $id)
    {
        $deleted = $offre->where('id',$id)->delete();
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
