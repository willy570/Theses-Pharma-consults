<?php

namespace App\Http\Controllers;

use App\Abonnement;
use App\Offre;
use App\These;
use Carbon\Carbon;
//use App\Historique;
use Redirect,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CinetPay\CinetPay;
use DateTime;

class AbonnementController extends Controller
{
    public $res = false;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->hasExpiredAbonnement();
        $offres = Offre::orderBy('id','ASC')->get();
        $userID = Auth::user()->id;
        $datas = Abonnement::where('user_id', $userID)->get();
        //$history_data = Historique::where('user_id', $userID)->get();
         return view('layouts.user.abonnement.index', compact('datas', 'offres', 'history_data'));
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


    //hasExpired suscription
    private function hasExpiredAbonnement()
    {

        /*$_userid = Auth::user()->id;
        $datas = Abonnement::where('expire_le', '>', date('Y-m-d H:i:s'))
                ->where('user_id',$_userid)->get();
        if ($datas != "") {
            $_forSave = ['user_id' =>$datas[0]["user_id"], 'offre_id'=>$datas[0]["offre_id"], 
            '_dateabonnement'=>$datas[0]["souscrit_le"], '_dateexpirationabonnement'=>$datas[0]["expire_le"],
            'operateur'=>$datas[0]["operateur"], 'numero_operation'=>$datas[0]["numero_operation"]];

            $_hdata = Historique::where('_dateabonnement', $datas[0]["souscrit_le"])
                        ->where('_dateexpirationabonnement', $datas[0]["expire_le"])
                        ->where('user_id',$_userid)->get();
            if ($_hdata == "" OR $_hdata ==NULL) {
                $this->res = Historique::insert($_forSave);
            }
          return $this->res;
        }*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function show(Abonnement $abonnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function edit(Abonnement $abonnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abonnement $abonnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abonnement $abonnement)
    {
        //
    }


    //check if user have subscription plan

    public function check(Request $request)
    {
        $state = ""; $message = ""; $doc = "";
        $userID = $request->id;
        $docID = $request->item;

        //get current date
        $curDate = Carbon::now();
        //dd($curDate);

        if ($request->ajax()) {
            $userSubscription = Abonnement::where('user_id', $userID)
                ->where('etat_abnmt', 0)
                ->where('expire_le', '>', date('Y-m-d H:i:s'))
                ->first();
            if ($userSubscription != null) {
                $state  = "success";
                $message = "Téléchargement en cours...";
                $document = These::find($docID);
                $doc = $document;
                $link = "http://www.theses.pharma-consults.com/public/uploads/";
                $file = $link.$doc['fichier'];
                $headers  = array('Content-type: application/pdf');

            } else {
                $state  = "error";
                $message = "Vous n'avez pas d'abonnement, veuillez souscrire à une offre!";
            }
            
        } else {
            $state  = "error";
            $message = "Opération échouée...";
            abort(404);
        }
        //return response()->download($file, $doc['fichier'], $headers );
        return response()->json([
            'state' => $state, 
            'message' => $message, 
            'doc'=>$doc, 
            'downloadlink'=>$file, 
            'entete'=>$headers
        ]);
    }



    //Paiement methode
    public function payment(Request $request, Offre $offre)
    {
        //Ajax request incoming check
        if ($request->ajax()) {

             //Check user if user logged 
        if (Auth::check()) {

            $orderMount = $offre::where('id', $request->offre)->get('cout');
            $offerDesc = $offre::where('id', $request->offre)->get('libelle'); 

            $apiKey = "4643703515e344562a9c2c6.40460772"; // Remplacez ce champs par votre APIKEY
            $site_id = "614606"; // Remplacez ce champs par votre SiteID
            $id_transaction = CinetPay::generateTransId(); // Identifiant du Paiement
            $description_du_paiement = sprintf('Mon abonnement de la transaction %s', $id_transaction); // Description du Payment
            $date_transaction = date("Y-m-d H:i:s"); // Date Paiement dans votre système
            $montant_a_payer = $orderMount[0]["cout"]; // Montant à Payer : minimun est de 5 francs sur CinetPay
            $identifiant_du_payeur = Auth::user()->id; // Mettez ici une information qui vous permettra d'identifier de façon unique le payeur
            $formName = "pharmaCinetPayForm"; // nom du formulaire CinetPay
            $notify_url = route('payment.notif'); // Lien de notification CallBack CinetPay (IPN Link)
            $return_url = route('payment.return'); // Lien de retour CallBack CinetPay
            $cancel_url = route('payment.cancel'); // Lien d'annulation CinetPay
            // Configuration du bouton
            $btnType = 4;//1-5xwxxw
            $btnSize = 'larger'; // 'small' pour reduire la taille du bouton, 'large' pour une taille moyenne ou 'larger' pour  une taille plus grande

            // Paramétrage du panier CinetPay et affichage du formulaire
            $cp = new CinetPay($site_id, $apiKey);
            try {
                $cp->setTransId($id_transaction)
                ->setDesignation($description_du_paiement)
                ->setTransDate($date_transaction)
                ->setAmount($montant_a_payer)
                ->setDebug(false)// Valorisé à true, si vous voulez activer le mode debug sur cinetpay afin d'afficher toutes les variables envoyées chez CinetPay
                ->setCustom($identifiant_du_payeur)// optional
                ->setNotifyUrl($notify_url)// optional
                ->setReturnUrl($return_url)// optional
                ->setCancelUrl($cancel_url);// optional
                $html = $cp->displayPayButton($formName, $btnType, $btnSize);

                //$rechargement = new Abonnement;        
            } catch (\Exception $e) {
                $type = "danger";
                //Essayer de faire un log ici
                //dd($e->getMessage());
                //return redirect()->route('abonnement.index');
            }
 
        }
    }
        //return view('layouts.user.abonnement.modalPay',compact('html','formName'));
    }


    //Methode de notification
    public function paymentNotification(Request $request)
    {
        //dd($request);
    }

    //Methode de retour de paiement
    public function paymentReturn(Request $request)
    {
        //Vérification de l'identification de la transaction
        if (isset($request->cpm_trans_id)) {
            try {
                $apiKey = "4643703515e344562a9c2c6.40460772"; // Remplacez ce champs par votre APIKEY
                $site_id = "614606"; //Veuillez entrer votre siteId
                $plateform = "PROD"; // Valorisé à PROD si vous êtes en production
                $version = "V1"; // Valorisé à V1 si vous voulez utiliser la version 1 de l'api

                // Identification du paiement
                    $id_transaction = $request->cpm_trans_id;

                //Creation d'une nouvelle instance de cinetpay et initialisation 
                    $cp = new CinetPay($site_id, $apiKey, $plateform, $version);

            // Reprise exacte des bonnes données chez CinetPay

            $cp->setTransId($id_transaction)->getPayStatus();
            $cpm_site_id = $cp->_cpm_site_id;
            $signature = $cp->_signature;
            $cpm_amount = $cp->_cpm_amount;
            $cpm_trans_id = $cp->_cpm_trans_id;
            $cpm_custom = $cp->_cpm_custom;
            $cpm_currency = $cp->_cpm_currency;
            $cpm_payid = $cp->_cpm_payid;
            $cpm_payment_date = $cp->_cpm_payment_date;
            $cpm_payment_time = $cp->_cpm_payment_time;
            $cpm_error_message = $cp->_cpm_error_message;
            $payment_method = $cp->_payment_method;
            $cpm_phone_prefixe = $cp->_cpm_phone_prefixe;
            $cel_phone_num = $cp->_cel_phone_num;
            $cpm_ipn_ack = $cp->_cpm_ipn_ack;
            $created_at = $cp->_created_at;
            $updated_at = $cp->_updated_at;
            $cpm_result = $cp->_cpm_result;
            $cpm_trans_status = $cp->_cpm_trans_status;
            $cpm_designation = $cp->_cpm_designation;
            $buyer_name = $cp->_buyer_name;

            // Recuperation de la ligne de la transaction dans votre base de données
            //Creation d'une instance d'abonnement et attribution des ligne souhaitées
            $abonnement = new Abonnement();
            $abonnement->prix = $cpm_amount;
            $abonnement->souscrit_le = $cpm_payment_date;
            $abonnement->operateur = $payment_method;
            $abonnement->numero_operation = $cel_phone_num;
            $abonnement->signature = $signature;
            $abonnement->site_id = $cpm_site_id;
            $abonnement->prefixe = $cpm_phone_prefixe;
            $abonnement->cpm_ipn_ack = $cpm_ipn_ack;
            $abonnement->cpm_payment_time = $cpm_payment_time;
            $abonnement->buyer_name = Auth::user()->name.' '.Auth::user()->lastname;
            $abonnement->user_id = Auth::user()->id;
            $abonnement->transaction_id = $cpm_trans_id;
            $abonnement->payid = $cpm_payid;

            // On verifie que le montant payé chez CinetPay correspond à notre montant en base de données pour cette transaction
            if ($abonnement->prix == $cpm_amount) {

                // C'est OK : On continue le remplissage des nouvelles données
                $abonnement->cp_error_message = $cpm_error_message;
                $abonnement->cp_result = $cpm_result;
                $abonnement->cpm_trans_status = $cpm_trans_status;
                $abonnement->numero_abnmt = $id_transaction;

                //ici on determine l'offre choisi par rapport au montant de celui-ci
                $offre = Offre::where('cout', $cpm_amount)->get();
                $abonnement->offre_id = $offre[0]["id"];
                $abonnement->interval_temps = $offre[0]["temps"];

                /*Calcul de la durée de validité de la souscription en fonction de 
                *la date de souscription
                */

                /*On récupère la date en cours ou date a 
                *laquelle la souscription a été effectué, puis on ajoute le bail correspondant 
                * au montant, (500 => 1 jour de validité, 2000 => 7 jour de validité, 5000 => 30 jours)
                */
                $date_souscription = $created_at;
                $stop_date = new \DateTime($date_souscription);

                //Determination du delais de bail
                switch ($cpm_amount) {
                    case 100:
                        $date_delai = $stop_date->modify('+1 day');
                        $abonnement->expire_le = $date_delai;
                        break;

                    case 500:
                        $date_delai = $stop_date->modify('+1 day');
                        $abonnement->expire_le = $date_delai;
                        break;

                    case 2000:
                        $date_delai = $stop_date->modify('+7 day');
                        $abonnement->expire_le = $date_delai;
                        break;

                    case 5000:
                        $date_delai = $stop_date->modify('+30 day');
                        $abonnement->expire_le = $date_delai;
                        break;
                }

                if($cpm_result == '00'){
                    //Le paiement est bon
                    // Traitez et delivrez le service au client
                    $abonnement->etat_abnmt = 0;

                }else{
                    //Le paiement a échoué
                    $abonnement->statut = 1;
                }

            }
            // Si le paiement est bon alors ne traitez plus cette transaction : die();
            // On met à jour notre ligne
            $abonnement->save();

            // On verifie que le montant payé chez CinetPay correspond à notre montant en base de données pour cette transaction

        // On verifie que le paiement est valide
        if ($cp->isValidPayment()) {
            $offres = Offre::orderBy('id','ASC')->get();
            $userID = Auth::user()->id;
            $datas = Abonnement::where('user_id', $userID)
                ->paginate(6);
            return view('layouts.user.abonnement.index', compact('datas', 'offres'))->with('successMsg','Felicitation, votre paiement a été effectué avec succès.');

                //echo 'Felicitation, votre paiement a été effectué avec succès';
                //die();
            } else {

                $offres = Offre::orderBy('id','ASC')->get();
                $userID = Auth::user()->id;
                $datas = Abonnement::where('user_id', $userID)
                ->paginate(6);
                $msg = $cp->_cpm_error_message;
                return view('layouts.user.abonnement.index', compact('datas', 'offres','msg'))->with('successMsg','Echec, votre paiement a échoué pour cause :');
                //echo 'Echec, votre paiement a échoué pour cause : ' . $cp->_cpm_error_message;
                //die();
            }
        } catch (\Exception $e) {
            // Une erreur s'est produite
            echo "Erreur :" . $e->getMessage();
            }
        } else {
            // redirection vers la page d'accueil
           
            die();
        }
        //dd($request);
    }



    //Methode d'annulation de paiement
    public function paymentCancel(Request $request)
    {
         return view('layouts.user.abonnement.index');
    }


    //Administration actions

    public function forAdministration()
    {
        $datas = Abonnement::orderBy('id','DESC')->paginate(10);
        $totalAbonnement = Abonnement::count();
        $totalAktive = Abonnement::where('expire_le', '>', date('Y-m-d H:i:s'))->count();
        $totaldsaAktive = Abonnement::where('expire_le', '<', date('Y-m-d H:i:s'))->count();
        //dd($totalAktive);

        return view('layouts.admin.abonnements.index', compact('datas','totalAbonnement', 'totalAktive', 'totaldsaAktive'));
    }

}
