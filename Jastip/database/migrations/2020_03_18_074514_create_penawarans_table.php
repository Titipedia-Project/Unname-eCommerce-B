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
            $table->id();
            $table->timestamps();
            $table->integer('harga_jasa_penawaran');
            $table->integer('harga_produk_penawaran');
            $table->string('alamat_penawaran');
            $table->string('kota_penawaran');
            $table->enum('status', ['menunggu', 'diterima', 'ditolak']);
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
