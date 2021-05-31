<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('dosen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nidn')->unique();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('jabatan_fungsional');
            $table->string('status');
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
        Schema::dropIfExists('dosen');
    }
}
