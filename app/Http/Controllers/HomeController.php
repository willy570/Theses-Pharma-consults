<?php

namespace App\Http\Controllers;

use App\Bibliotheque;
use App\Ligne;
use App\These;
use App\User;
use App\Abonnement;
use Illuminate\Http\Request;
use DataTables;
use Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard for normal user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(auth()->user()->is_admin == 1){
            $users = User::where('is_admin', '=', null)->get();
            $countUser = count($users);

            $revenu = Abonnement::sum('prix');
            $nbAbon = Abonnement::count();
            $nbThese = These::count();

            $chart_options = [
                'chart_title' => 'Users by months',
                'report_type' => 'group_by_date',
                'model' => 'App\User',
                'group_by_field' => 'created_at',
                'group_by_period' => 'day',
                'chart_type' => 'line',
                'conditions' => [
                    ['name' =>'user', 'condition' =>'id = 2', 'color' => '4e73df']
                ]
            ];
            $chart1 = new LaravelChart($chart_options);
            //dd($chart1);

            return view('layouts.admin.index', compact('countUser', 'revenu', 'nbAbon', 'nbThese', 'chart1'));
        }else{
            
            $lignes = Ligne::where('user_id', auth()->user()->id)->get();
            $count = $lignes->count();
            $biblio = Bibliotheque::where('user_id', auth()->user()->id)->count();
            $userbiblio = Bibliotheque::where('user_id', auth()->user()->id)->get();
            $abon = Abonnement::where('user_id', auth()->user()->id)->get();
            return view('layouts.user.index', compact('lignes', 'count', 'biblio', 'userbiblio', 'abon')); 
        }
    }



    /**

     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        Bibliotheque::updateOrCreate(['id' => $request->bibliotheque_id],
            ['libelle' => $request->name]);        

        return response()->json(['success'=>'Product saved successfully.']);

    }

    /**

     * Show the form for editing the specified resource.
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Bibliotheque::find($id);
        return response()->json($product);

    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bibliotheque $biblio, $id)
    {
        $deleted = $biblio->where('id',$id)->delete();
        
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

    /**
     * Show the application dashboard for admin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        //if(auth()->user()->is_admin == 1)      

    }

    //return index view for bibliotheque module
    public function biblioIndex()
    {
        $user_id = Auth::user()->id;
        $datas = Bibliotheque::where('user_id', $user_id, 'asc')->get();
        $lignes = Ligne::where('user_id', $user_id, 'asc')->get();
        //dd($datas);
        return view('layouts.user.bibliotheque.index', compact('datas', 'lignes'));
    }

    //Store new bibliotheque resource in database
    public function biblioStore(Request $request)
    {
        //get connected user id
        $user_id = Auth::user()->id;

        //default disponibilite
         $default  = 1;

        Bibliotheque::Create(['libelle' => $request->library_name, 'disponibilite' => $default, 'user_id' => $user_id, 
            ]);
            $user_id = Auth::user()->id;
        $datas = Bibliotheque::where('user_id', $user_id)->get();      
        $lignes = Ligne::where('user_id', $user_id)->get();      
        return view('layouts.user.bibliotheque.index', compact('datas', 'lignes'));

    }


    public function letCheck(Request $request)
    {
        //dd($request);
        $state = ""; $message = ""; $doc = "";
        $ligneID = $request->_ligne;
        if (Auth::user()) {
            //verification user has valid suscription
            $userSubscription = Abonnement::where('user_id', Auth::user()->id)
                ->where('expire_le', '>', date('Y-m-d H:i:s'))
                ->first();
                if ($userSubscription) {
                    $state  = "success";
                    $message = "Téléchargement dans quelque instant...";
                    //recuperation de la ligne
                    $lignes = Ligne::where('id', $ligneID)->first();
                    //Recuperation de la thèse concerné
                    $document = These::find($lignes->these_id);
                    $doc = $document;
                    //Definition du lien relatif
                    $link = "http://www.theses.pharma-consults.com/public/uploads/";
                    //Definition du lien absolu
                    $file = $link.$doc['fichier'];
                    //Entete ajouter
                    $headers  = array('Content-type: application/pdf');
                }else{
                    $state  = "error";
                    $message = "Vous n'avez pas d'abonnement, veuillez acheter une offre!";
                }
        }else{
            $state  = "error";
            $message = "veuillez vous connecter!";
        }
        return response()->json([
            'state' => $state,'message' => $message,'doc'=>$doc,'downloadlink'=>$file, 'entete'=>$headers
        ]);
    }

}
