<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailSgas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detail_sgas', function (Blueprint $table) {
            $table->bigIncrements('id_detailsgas');
            $table->string('id_sgas');
            $table->string('kode_matkul');
            $table->string('prodi');
            $table->string('semesterd');
            $table->string('kelas');
            $table->string('tsks');
            $table->string('psks');
            $table->string('ksks');
            $table->float('total');
            $table->float('grandtotal');
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
