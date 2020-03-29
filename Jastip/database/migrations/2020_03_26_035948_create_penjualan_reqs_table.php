<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanReqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_reqs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kode_transaksi');
            $table->string('kurir');
            $table->string('service');
            $table->date('tanggal_penjualan');
            $table->date('tanggal_pengiriman')->nullable();
            $table->string('nomor_resi');
            $table->integer('total_harga');
            $table->enum('status_penjualan_req', ['menunggu', 'dikirim', 'diterima', 'selesai']);
            $table->integer('rating');
            $table->integer('id_penawaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan_reqs');
    }
}