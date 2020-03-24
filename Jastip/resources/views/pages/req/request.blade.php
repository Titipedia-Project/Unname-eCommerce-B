@extends('layouts.profileview')
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
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Kota Asal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($req as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->jumlah}}</td>
                            <td>{{$data->keterangan}}</td>
                            <td>{{$data->kota_tujuan}}</td>
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