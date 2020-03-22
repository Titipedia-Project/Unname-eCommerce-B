@extends('layouts.profileview')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Data Produk</h3>
        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <a href="produk/create" class="btn btn-success" style="background-color: #65587f; border: hidden">Tambah Data</a>
                </div>
            </div>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="mt-3">
                <table id="table_product" class="table table-striped table-bordered table-hover">
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
                            <td><a href="/produk/{{$data->id}}" class="badge badge-primary">detail</a>
                                <a href="/produk/{{$data->id}}/edit" class="badge badge-success">edit</a>
                                <!-- <a href="" class="badge badge-danger">delete</a> -->
                                <form action="/produk/{{$data->id}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge badge-danger">Delete</button>
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