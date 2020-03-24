<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    //
    protected $fillable = ['nama', 'jumlah', 'gambar', 'id_user', 'keterangan', 'kota_tujuan'];
}
