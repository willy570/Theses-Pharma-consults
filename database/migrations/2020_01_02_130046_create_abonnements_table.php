<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('numero_abnmt')->nullable();
            $table->integer('prix')->unsigned()->default(0)->nullable();
            $table->timestamp('souscrit_le')->nullable(false);
            $table->timestamp('expire_le')->nullable(false);
            $table->integer('interval_temps')->nullable(false);
            $table->char('operateur')->nullable(false);
            $table->char('numero_operation')->nullable(false);
            $table->boolean('etat_abnmt')->default(1)->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('offre_id');
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonnements');
    }
}
