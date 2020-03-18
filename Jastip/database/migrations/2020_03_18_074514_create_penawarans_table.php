<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawarans', function (Blueprint $table) {
            $table->id('id_penawaran');
            $table->timestamps();
            $table->integer('harga_jasa');
            $table->integer('harga_produk');
            $table->integer('ongkir');
            $table->enum('status', ['menunggu', 'diterima', 'ditolak']);
            $table->enum('proses', ['menunggu pembayaran', 'dikirim', 'diterima', 'sukses']);
            $table->enum('pencairan', ['belum', 'sudah']);
            $table->integer('id_penerima');
            $table->integer('id_request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penawarans');
    }
}
