<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPenelitian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detail_penelitian', function (Blueprint $table) {
            $table->bigIncrements('id_penelitian');
            $table->string('id_sgas');
            $table->string('jenis_penelitian');
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
