@extends('layouts.default')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Produk</h3>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="/produk">
                @csrf
                <div class="form-group row">
                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_produk" class="col-sm-2 col-form-label">Jenis Produk</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="jenis_produk" name="jenis_produk">
                            <option selected>Open this select menu</option>
                            <option value="bulk">Bulk Buy</option>
                            <option value="normal">Normal Buy</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-2 col-form-label">Stok Produk</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="stok" name="stok">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_jasa" class="col-sm-2 col-form-label">Harga Jasa</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="harga_jasa" name="harga_jasa">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_produk" class="col-sm-2 col-form-label">Harga Produk</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="harga_produk" name="harga_produk">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berat" class="col-sm-2 col-form-label">Berat (Kg)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="berat" name="berat">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gambar" class="col-sm-2 col-form-label">Pilih Banner</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" hidden name="id_user" value="{{Auth::user()->id}}">
                    </div>
                </div>
                <div class="form-group row pull-right">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop