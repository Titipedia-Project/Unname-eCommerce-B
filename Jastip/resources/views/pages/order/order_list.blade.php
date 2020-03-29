@extends('layouts.profileview')
@section('content')
<div class="container mt-4 shadow-lg p-3 mb-5 bg-white rounded border-0">
    <div class="card border-0">
        <div class="card-header bg-white">
            <h3>Daftar Pembelian Pre-Order</h3>
        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <a href="produk/create" class="btn btn-success"
                        style="background-color: #65587f; border: hidden">Tambah Data</a>
                </div>
            </div>
            <div class="mt-3">
                <table id="table_product" class="table table-hover">
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
                        <tr>
                            <td></td>
                            
                            <td>
                                <!-- <a href="" class="badge badge-danger">delete</a> -->
                                <form action="" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge badge-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop