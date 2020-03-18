<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesans', function (Blueprint $table) {
            $table->id('id_pesans');
            $table->timestamps();
            $table->string('isi_pesan');
            $table->dateTime('waktu_kirim');
            $table->enum('dibaca', ['belum', 'sudah']);
            $table->integer('id_penerima');
            $table->integer('id_pengirim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesans');
    }
}
