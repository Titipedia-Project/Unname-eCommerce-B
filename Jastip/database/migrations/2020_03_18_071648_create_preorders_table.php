<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preorders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kode_transaksi');
            $table->string('kurir');
            $table->string('service');
            $table->integer('ongkir');
            $table->date('tanggal_penjualan');
            $table->date('tanggal_pengiriman')->nullable();
            $table->string('nomor_resi');
            $table->enum('status_order', ['menunggu', 'dikirim', 'diterima', 'selesai']);
            $table->integer('id_penjual');
            $table->integer('id_pembeli');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preorders');
    }
}
