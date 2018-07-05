<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasilitas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('poto');
            $table->unsignedInteger('kategoripasilitas_id');
            $table->foreign('kategoripasilitas_id')->references('id')->on('kategori_pasilitas')->ondelete('cascade');
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
        Schema::dropIfExists('pasilitas');
    }
}
