<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique(); //Originally unique()
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('jenis_kelamin')->default('');
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->default('');
            $table->string('alamat')->default('');
            $table->string('kota')->default('');
            $table->string('no_hp')->default('');
            $table->string('foto')->default('');
            $table->bigInteger('saldo')->default(0);
            $table->integer('rating')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
