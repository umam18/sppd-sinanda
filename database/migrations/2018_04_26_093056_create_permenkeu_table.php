<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermenkeuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permenkeu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('provinsi');
            $table->integer('Taksi');
            $table->integer('PenginapanE1');
            $table->integer('PenginapanE2');
            $table->integer('PenginapanG12');
            $table->integer('PenginapanG3');
            $table->integer('PenginapanG4');
            $table->integer('Fullboard_Luar');
            $table->integer('Fullboard_Dalam');
            $table->integer('Harian_Fullday');
            $table->integer('Harian_Normal');
            $table->integer('Diklat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permenkeu');
    }
}
