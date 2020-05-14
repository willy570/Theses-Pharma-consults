<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyOnDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->unsignedInteger('universite_id')->after('description')->nullable();
            $table->unsignedInteger('ufr_id')->nullable();

            $table->foreign('universite_id')->references('id')->on('universites')->onDelete('cascade');
            $table->foreign('ufr_id')->references('id')->on('ufrs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments', function (Blueprint $table) {
            Schema::dropIfExists('universite_id');
            Schema::dropIfExists('ufr_id');
        });
    }
}
