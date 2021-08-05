<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPengabdian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detail_pengabdian', function (Blueprint $table) {
            $table->bigIncrements('id_pengabdian');
            $table->string('id_sgas');
            $table->string('jenis_pengabdian');
            $table->string('sks');
            $table->string('masa_penugasan');
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
