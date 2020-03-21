<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('isi_notifikasi');
            $table->dateTime('waktu_kirim');
            $table->enum('jenis', ['preorder', 'request']);
            $table->enum('dibaca', ['belum', 'sudah']);
            $table->integer('id_penerima');
            $table->integer('id_trigger');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifikasis');
    }
}
