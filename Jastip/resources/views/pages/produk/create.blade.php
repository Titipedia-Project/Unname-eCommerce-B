@extends('layouts.fullview')
@section('content')
<div class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded border-0">
    <div class="card border-0">
        <div class="card-header bg-white">
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
                            <option value="normal">Normal Buy</option>
                            <option value="bulk">Bulk Buy</option>
                        </select>
                        @error('jenis_produk')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_produk" class="col-sm-2 col-form-label">Kategori Produk</label>
                    <div class="col-sm-10">
                        <select class="custom-select @error('jenis_produk') is-invalid @enderror" id="jenis_produk" name="nama_kategori" value="{{old('jenis_produk')}}">
                            @foreach($kategoris as $key => $data)
                            <option value="{{$key}}">{{$data->nama_kategori}}</option>
                            @endforeach
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
                        @error('gambar')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" hidden name="id_user" value="{{Auth::user()->id}}">
                    </div>
                </div>
                <div class="form-group row pull-right d-inline p-2">
                    <div class="col-sm-10">
                        <a href="/produk" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <div class="form-group row pull-right p-2">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success" style="background-color: #65587f; border: hidden">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop