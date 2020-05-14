<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsOnThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theses', function (Blueprint $table) {
            $table->string('titre');
            $table->string('auteur');
            $table->string('resume')->nullable()->default('en cours de redaction');
            $table->string('fichier')->nullable();
            $table->unsignedInteger('universite_id')->nullable();
            $table->unsignedInteger('ufr_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('discipline_id')->nullable();


            $table->foreign('universite_id')->references('id')->on('universites')->onDelete('cascade');
            $table->foreign('ufr_id')->references('id')->on('ufrs')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('discipline_id')->references('id')->on('disciplines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('theses', function (Blueprint $table) {
            
        });
    }
}
