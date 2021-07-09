<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ta', function (Blueprint $table) {
            $table->bigIncrements('id_ta');
            $table->string('ta');
            $table->string('tglgjl');
            $table->string('tglgnp');
            $table->string('min');
            $table->string('max');
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
