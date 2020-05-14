<?php

namespace App\Http\Controllers;

use App\Discipline;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\sousdisciplineRequest;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = Discipline::paginate(10);
        return view('layouts.admin.disciplines.index', compact('disciplines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dpt = Department::pluck('libelle', 'id');
        return view('layouts.admin.disciplines.create', compact('dpt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(sousdisciplineRequest $request)
    {
        $valided = $request->validated();
         //dd($request->get('university-name'));
         if ($valided && $request->get('_token')) {
             $datas = ['libelle' =>$request->get('discipline-title'), 'department_id' => $request->get('university-name')];

              $saved = Discipline::create($datas);

         }

        if ($saved) {
           return redirect()->route('disciplines.home')->withStatus(__('Discipline enregistrée avec succès !'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function show(Discipline $discipline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function edit(Discipline $discipline)
    {   
         $all=Department::get();
         return view('layouts.admin.disciplines.edit', compact('discipline', 'all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discipline $discipline)
    {
        $data = [];
        //dd($request);
        if ($request->dept) {
            $data = ['libelle'=>$request->lbldiscpline, 'department_id'=>$request->dept];
        }else{
            $data = ['libelle'=>$request->lbldiscpline];
        }
        $response = $discipline->where('id', $request->_id)->update($data);

        return redirect()->route('disciplines.home')->withStatus(__('Modification effectuée!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discipline $discipline, $id)
    {
        $deleted = $discipline->where('id',$id)->delete();
        
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
