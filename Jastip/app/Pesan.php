<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    //
    protected $fillable = ['isi_pesan', 'id_pengirim', 'id_penerima', 'waktu_kirim', 'dibaca'];
}
