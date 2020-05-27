<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutasi_Saldo extends Model
{
    //
    protected $table = 'mutasi_saldos';
    protected $fillable = ['nama_bank', 'saldo_masuk', 'saldo_keluar', 'keterangan', 'tanggal', 'user_id'];
}
