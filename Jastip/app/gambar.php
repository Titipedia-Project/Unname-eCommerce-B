<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gambar extends Model
{
    protected $table = 'gambars';
    protected $fillable = ['url', 'id_produk', 'id_bulkbuy', 'id_reqs'];
}
