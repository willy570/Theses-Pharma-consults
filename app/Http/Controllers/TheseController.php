<?php

namespace App\Http\Controllers;

use App\These;
use App\Universite;
use App\Ufr;
use App\Department;
use App\Discipline;
use Illuminate\Http\Request;
use App\Http\Requests\theseRequest;
use Illuminate\Support\Str;

class TheseController extends Controller
{
     public $logo, $logo_file = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = These::orderBy('id', 'DESC')->paginate(6);
        $nb = These::all();
        $stat = $nb->count();
        return view('layouts.admin.theses.index', compact('docs', 'stat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $universties = Universite::pluck('denomination', 'id');
        $ufrs = Ufr::pluck('libelle', 'id');
        $dpts = Department::pluck('libelle', 'id');
        $disciplines = Discipline::pluck('libelle', 'id');
        return view('layouts.admin.theses.create', compact('universties', 'ufrs', 'dpts', 'disciplines'));
    }


    public function modalkeyword(Request $request)
    {   
        $id = $request->get('id');
        return view('layouts.admin.theses.addkeyword', compact('id'));
    }

    public function addkeyword(Request $request)
    {   
        $words = strtolower($request->keywords);
        $_tid = $request->these_id;

        $response = These::where('id',$_tid)->update(['keywords' => $words]);
        if($response){

            $state = "success";
            $message = "Youpii, mots clés ajoutés !";
        }
        else{

            $state = "error";
            $message = "Erreur survenue, réessayer.";
        }

        return response()->json(['etat' => $state, 'message'=>$message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(theseRequest $request)
    {
        //$insert['file'] = '';
        $valided = $request->validated();
        if ($valided) {
             $slug = $this->createSlug($request->get('these-title'));

        
            if ($files = $request->file('these-file')) {
                $destinationPath = 'public/uploads/'; // upload path
                $profilefile = $slug.".". $files->getClientOriginalExtension();
                $files->move($destinationPath, $profilefile);
                $insert['file'] = $profilefile;
            }
    
            $datas = [
                'titre' =>strtolower($request->get('these-title')),
                'auteur'=>strtolower($request->get('these-author')),
                'resume'=>strtolower($request->get('these-summary')),
                'universite_id'=>$request->get('university-name'), 
                'ufr_id'=>$request->get('these-ufrs'), 
                'department_id'=>$request->get('these-departement'), 
                'discipline_id'=>$request->get('these-discipline'), 
                'annee'=>$request->get('these-valided-date'), 
                'fichier'=>$insert['file'],
                'url' => $slug,
                'keywords' => strtolower($request->get('these-keywords'))
            ];
                $saved = These::create($datas);

            if ($saved) {
               return redirect()->route('theses.home')->withStatus(__('Document enregistré avec succès !'));
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\These  $these
     * @return \Illuminate\Http\Response
     */
    public function show(These $these)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\These  $these
     * @return \Illuminate\Http\Response
     */
    public function edit(These $these)
    {
        $universties = Universite::pluck('denomination', 'id');
        $ufrs = Ufr::pluck('libelle', 'id');
        $dpts = Department::pluck('libelle', 'id');
        $disciplines = Discipline::pluck('libelle', 'id');
        return view('layouts.admin.theses.edit', compact('these', 'universties', 'ufrs', 'dpts', 'disciplines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\These  $these
     * @return \Illuminate\Http\Response
     */
    public function update(theseRequest $request, These $these)
    {
        //dd($request);
        $valided = $request->validated();
        if ($request->has('theseid')) {

            if ($files = $request->file('these-file')) {
                $destinationPath = 'public/uploads/'; // upload path
                $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profilefile);
                $insert['file'] = $profilefile;
            }

            $datas = [

                'titre' =>$request->get('these-title'),
                'auteur'=>$request->get('these-author'),
                'resume'=>$request->get('these-summary'),
                'universite_id'=>$request->get('university-name'), 
                'ufr_id'=>$request->get('these-ufrs'), 
                'department_id'=>$request->get('these-departement'), 
                'discipline_id'=>$request->get('these-discipline'), 
                'annee'=>$request->get('these-valided-date'), 
                'fichier'=>$insert['file']
            ];

            //$response = $these::where('')

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\These  $these
     * @return \Illuminate\Http\Response
     */
    public function destroy(These $these, $id)
    {
        $deleted = $these->where('id',$id)->delete();
        
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




    public function createSlug($title, $id = 0)
    {
        // Normalize the title

        $slug = Str::slug(strtolower($title));

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('url', $slug)){
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('url', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return These::select('url')->where('url', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }

}
