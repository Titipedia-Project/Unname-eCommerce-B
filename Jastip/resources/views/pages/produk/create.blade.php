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
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" value="{{old('nama_produk')}}">
                        @error('nama_produk')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_produk" class="col-sm-2 col-form-label">Jenis Produk</label>
                    <div class="col-sm-10">
                        <select class="custom-select @error('jenis_produk') is-invalid @enderror" id="jenis_produk" name="jenis_produk" value="{{old('jenis_produk')}}">
                            <option selected>Open this select menu</option>
                            <option value="bulk">Bulk Buy</option>
                            <option value="normal">Normal Buy</option>
                        </select>
                        @error('jenis_produk')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-2 col-form-label">Stok Produk</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{old('stok')}}">
                        @error('stok')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_jasa" class="col-sm-2 col-form-label">Harga Jasa</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('harga_jasa') is-invalid @enderror" id="harga_jasa" name="harga_jasa" value="{{old('harga_jasa')}}">
                        @error('harga_jasa')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_produk" class="col-sm-2 col-form-label">Harga Produk</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('harga_produk') is-invalid @enderror" id="harga_produk" name="harga_produk" value="{{old('harga_produk')}}">
                        @error('harga_produk')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berat" class="col-sm-2 col-form-label">Berat (Kg)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('berat') is-invalid @enderror" id="berat" name="berat" value="{{old('berat')}}">
                        @error('berat')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
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
                        <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{old('gambar')}}">
                        @error('berat')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
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