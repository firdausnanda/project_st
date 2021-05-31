<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sgas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sgas', function (Blueprint $table) {
            $table->bigIncrements('id_sgas');
            $table->string('id_dosen');
            // $table->string('kode_matkul');

            // $table->string('kelas');
            // $table->string('tsks');
            // $table->string('psks');
            // $table->string('ksks');

            $table->string('ta');
            $table->string('semester');

            $table->string('validasi');
            
            //$table->string('nama_matkul');
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
    }
}
