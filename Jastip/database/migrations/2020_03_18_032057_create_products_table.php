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
            $table->id('id_produk');
            $table->timestamps();
            $table->string('nama');
            $table->enum('jenis_produk', ['bulk', 'normal']);
            $table->integer('jumlah');
            $table->integer('harga_jasa');
            $table->integer('harga_produk');
            $table->integer('berat');
            $table->string('gambar');
            $table->string('keterangan');
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
