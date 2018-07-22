<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->increments('id', true); 
            $table->string('pejabat');
            $table->string('posisi');
            $table->string('nip_pejabat');
            $table->string('bendahara');
            $table->string('nip_bendahara');
            $table->string('nama');
            $table->string('nip');
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('biaya');
            $table->string('maksud');
            $table->string('berangkat');
            $table->string('tujuan');
            $table->string('transportasi');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_kembali');
            $table->integer('lama');
            $table->integer('keluaran');
            $table->integer('komponen');
            $table->string('sub');
            $table->integer('akun');
            $table->string('ket');
            $table->integer('h_ku');
            $table->integer('t_ku');
            $table->string('n_transport');
            $table->string('no_berangkat');
            $table->string('no_kembali');
            $table->integer('h_tiket');
            $table->integer('t_transport');
            $table->string('n_penginapan');
            $table->integer('j_penginapan');
            $table->integer('h_penginapan');
            $table->integer('t_penginapan');
            $table->integer('j_hn');
            $table->integer('h_hn');
            $table->integer('t_hn');
            $table->integer('j_fd');
            $table->integer('h_fd');
            $table->integer('t_fd');
            $table->integer('j_fb');
            $table->integer('h_fb');
            $table->integer('t_fb');
            $table->integer('j_diklat');
            $table->integer('h_diklat');
            $table->integer('t_diklat');
            $table->integer('t_uh');
            $table->integer('t_all');
            $table->string('terbilang');
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
        Schema::dropIfExists('event');
    }
}
