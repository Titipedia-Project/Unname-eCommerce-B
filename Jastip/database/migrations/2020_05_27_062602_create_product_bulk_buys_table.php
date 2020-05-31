<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductBulkBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_bulk_buys', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->integer('minimum_target');
            $table->integer('maximum_target');
            $table->integer('harga_jasa');
            $table->integer('harga_produk');
            $table->integer('berat');
            $table->string('keterangan')->nullable();
            $table->string('asal_pengiriman');
            $table->integer('id_user');
            $table->integer('id_kategori');
            $table->date('batas_waktu');
            $table->enum('status', ['menunggu', 'diproses']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_bulk_buys');
    }
}
