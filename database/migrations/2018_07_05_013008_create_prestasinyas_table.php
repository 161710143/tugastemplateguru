<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestasinyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasinyas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('tanggal_prestasi');
            $table->string('deskripsi');
            $table->unsignedInteger('ekskul_id');
            $table->foreign('ekskul_id')->references('id')->on('ekskulsmps')->ondelete('cascade');
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
        Schema::dropIfExists('prestasinyas');
    }
}
