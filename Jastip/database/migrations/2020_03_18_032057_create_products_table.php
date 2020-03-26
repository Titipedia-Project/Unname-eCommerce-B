<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->enum('jenis_produk', ['bulk', 'normal']);
            $table->integer('stok');
            $table->integer('harga_jasa');
            $table->integer('harga_produk');
            $table->integer('berat');
            $table->string('gambar')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('asal_pengiriman');
            $table->integer('id_user');
            $table->integer('id_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
