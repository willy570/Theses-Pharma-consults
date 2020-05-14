<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTheseIdOnLigneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lignes', function (Blueprint $table) {
            $table->unsignedInteger('these_id')->default(0)->nullable(true);
             $table->foreign('these_id')->references('id')->on('theses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lignes', function (Blueprint $table) {
            dropIfExists('these_id');
        });
    }
}
