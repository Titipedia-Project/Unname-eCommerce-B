@extends('layouts.productview')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Data Request</h3>
        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <a href="request/createreq" class="btn btn-success" style="background-color: #65587f; border: hidden">Tambah Data Request</a>
                </div>
            </div>
            @if (session('status')==="Data Berhasil Ditambahkan!")
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @elseif (session('status')==="Data Request Order Berhasil Diubah!")
            <div class="alert alert-primary">
                {{ session('status') }}
            </div>
            @elseif (session('status')==="Data Request Order Berhasil Dihapus!")
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
            @endif
            <div class="mt-3">
                <table id="table_product" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($req as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama_req}}</td>
                            <td>{{$data->jumlah_req}}</td>
                            <td>{{$data->alamat_req}}</td>
                            <td>{{$data->kota_req}}</td>
                            <td>{{$data->status_req}}</td>
                            <td>{{$data->keterangan}}</td>
                            <td><a href="/request/{{$data->id}}" class="badge badge-primary">detail</a>
                                <a href="/request/{{$data->id}}/edit" class="badge badge-success">edit</a>
                                <!-- <a href="" class="badge badge-danger">delete</a> -->
                                <form action="/request/{{$data->id}}" method="post">
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