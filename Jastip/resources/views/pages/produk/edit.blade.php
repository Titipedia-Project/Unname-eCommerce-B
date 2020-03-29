@extends('layouts.fullview')
@section('content')
<div class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded border-0">
    <div class="card">
        <div class="card-header">
            <h3>Ubah Data Produk</h3>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="/produk/{{$product->id}}">
                @method('patch')
                @csrf
                <div class="form-group row">
                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" value="{{$product->nama}}">
                        @error('nama_produk')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_produk" class="col-sm-2 col-form-label">Jenis Produk</label>
                    <div class="col-sm-10">
                        <select class="custom-select @error('jenis_produk') is-invalid @enderror" id="jenis_produk" name="jenis_produk" value="{{$product->jenis_produk}}">
                            @if($product->jenis_produk === "normal")
                                <option selected value="normal">Normal Buy</option>
                                <option value="bulk">Bulk Buy</option>
                            @else
                                <option value="normal">Normal Buy</option>
                                <option selected value="bulk">Bulk Buy</option>
                            @endif
                            
                        </select>
                        @error('jenis_produk')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-2 col-form-label">Stok Produk</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{$product->stok}}">
                        @error('stok')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_jasa" class="col-sm-2 col-form-label">Harga Jasa</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('harga_jasa') is-invalid @enderror" id="harga_jasa" name="harga_jasa" value="{{$product->harga_jasa}}">
                        @error('harga_jasa')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_produk" class="col-sm-2 col-form-label">Harga Produk</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('harga_produk') is-invalid @enderror" id="harga_produk" name="harga_produk" value="{{$product->harga_produk}}">
                        @error('harga_produk')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berat" class="col-sm-2 col-form-label">Berat (Kg)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('berat') is-invalid @enderror" id="berat" name="berat" value="{{$product->berat}}">
                        @error('berat')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" value="{{$product->keterangan}}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gambar" class="col-sm-2 col-form-label">Pilih Banner</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                        <div class="card" style="width: 18rem;">
                            <img class="rounded img-thumbnail" src="{{asset('produk_images/' . $product->gambar)}}">

                        </div>

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
                        <button type="submit" class="btn btn-success" style="background-color: #65587f; border: hidden">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop