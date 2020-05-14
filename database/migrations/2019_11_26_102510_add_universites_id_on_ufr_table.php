<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniversitesIdOnUfrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ufrs', function (Blueprint $table) {
            $table->unsignedInteger('universite_id')->after('libelle')->nullable();
            $table->foreign('universite_id')->references('id')->on('universites')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ufrs', function (Blueprint $table) {
            Schema::dropIfExists('universite_id');
        });
    }
}
