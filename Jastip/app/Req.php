<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    //
    protected $fillable = ['nama_req', 'jumlah_req', 'alamat_req', 'kota_req', 'status_req', 'keterangan', 'gambar', 'id_user'];
}
