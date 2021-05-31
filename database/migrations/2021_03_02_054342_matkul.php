<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Matkul extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('matkul', function (Blueprint $table) {
            $table->bigIncrements('id_matkul');
            $table->string('kode_matkul');
            $table->string('nama_matkul');
            $table->string('semester');
            $table->string('sks');
            $table->float('t');
            $table->float('p');
            $table->float('k');
            $table->string('kurikulum');
            $table->string('nama_dosen');
            $table->string('prodii');
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
        //
        Schema::dropIfExists('matkul');
    }
}
