@extends('layouts.default')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Data Produk</h3>
        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <a href="" class="btn btn-success">Tambah Data</a>
                </div>
            </div>
            <div class="mt-3">
                <table id="tableProduct" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jenis Produk</th>
                            <th>Stok</th>
                            <th>Harga Jasa</th>
                            <th>Harga Produk</th>
                            <th>Berat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->jenis_produk}}</td>
                            <td>{{$data->stok}}</td>
                            <td>{{$data->harga_jasa}}</td>
                            <td>{{$data->harga_produk}}</td>
                            <td>{{$data->berat}}</td>
                            <td><a href="/produk/1" class="badge badge-primary">detail</a>
                                <a href="" class="badge badge-success">edit</a>
                                <a href="" class="badge badge-danger">delete</a>
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