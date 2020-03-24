<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['kode_transaksi', 'kurir', 'service', 'ongkir', 'tanggal_penjualan', 'tanggal_pengiriman', 'nomer_resi', 'status_order', 'id_user', 'id_kategori'];
}
