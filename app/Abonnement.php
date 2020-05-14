<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    //
   protected $fillable = [
        'numero_abnmt', 'prix', 'souscrit_le', 'expire_le', 'interval_temps', 'operateur', 'numero_operation', 'etat_abnmt', 'site_id', 'signature', 'transaction_id', 'payid', 'etat_abnmt',
        'methode','prefixe', 'cpm_ipn_ack', 'cpm_payment_time', 'buyer_name', 'cpm_trans_status', 'user_id','offre_id', 'created_at', 'updated_at', 'cp_error_message', 'cp_result'
    ];


    public function offres()
    {
    	return $this-> belongsTo('App\Offre', 'offre_id');
    }

    public function users()
    {
    	return $this-> belongsTo('App\User', 'user_id');
    }

}
