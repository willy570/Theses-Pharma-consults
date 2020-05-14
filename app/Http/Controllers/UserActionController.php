<?php

namespace App\Http\Controllers;

use App\Bibliotheque;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Auth;

class UserActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        // Get the currently authenticated user's ID...
        $id = Auth::id();


        $data['bibliotheques'] = Bibliotheque::where('id', $id)->orderBy('id','desc')->paginate(8);
        return view('home',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $biblioId = $request->biblio_id;
        $biblio   =   Bibliotheque::updateOrCreate(['id' => $biblioId],
                    ['libelle' => $request->name, 'user_id' => $id = Auth::id()]);
    
        return Response::json($biblio);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $biblio  = Bibliotheque::where($where)->first();
 
        return Response::json($biblio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($user = Auth::user()) {
            try {
                $biblio = Bibliotheque::where('id',$id)->delete();
            } catch (Exception $e) {
                
            }
        }
        return Response::json($biblio);
    }
}
