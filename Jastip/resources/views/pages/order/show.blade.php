@extends('layouts.pembelianview')
@section('content')
<div class="container mt-5">
    <div class="card  shadow-lg p-3 mb-5 bg-white rounded border-0">
        <div class="card-header bg-white">
            <h3>Daftar Pre-Order</h3>
        </div>
        <div class="card-body">
            <div class="mt-3">
                <table id="table_order" class="table  table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>Kode Transaksi</th>
                            <th>Nama Produk</th>
                            <th>Jenis Produk</th>
                            <th>Kategori</th>
                            <th>Gambar Produk</th>
                            <th>Jumlah Beli</th>
                            <th>Kurir</th>
                            <th>Servis</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $data)
                        <tr>
                        <td>{{$data->kode_transaksi}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->jenis_produk}}</td>
                        <td>{{$data->nama_kategori}}</td>
                        <td><img class="w-100" src="{{asset('produk_images/'.$data->gambar)}}"></td>
                        <td>{{$data->kuantitas}}</td>
                        <td>{{$data->kurir}}</td>
                        <td>{{$data->service}}</td>
                        <td>{{$data->total_harga}}</td>
                        <td>{{$data->status_order}}</td>
                        <td>
                                <!-- <a href="" class="badge badge-danger">delete</a> -->
                                <form action="" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge badge-danger">Cancel Order</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

