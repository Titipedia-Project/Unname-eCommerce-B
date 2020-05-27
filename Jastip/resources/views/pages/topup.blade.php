@extends('layouts.fullview')
@section('content')
<div class="container mt-4 shadow-lg p-3 mb-5 bg-white rounded border-0">
    <div class="card border-0">
        <div class="card-header bg-white">
            <h3>Total Saldo : Rp.{{Auth::user()->saldo}}</h3>
        </div>
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <a href="#" class="btn btn-success" style="background-color: #65587f; border: hidden" data-toggle="modal" data-target="#exampleModal">Top Up Saldo</a>
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#tarik">Tarik Saldo</a>
                </div>
            </div>
            @if (session('status') === "Saldo Berhasil di Tambah!")
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @elseif (session('status') === "Saldo Berhasil Diambil!")
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @elseif (session('status') === "Jumlah Yang Anda Ambil Melebihi Limit Saldo Anda!")
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
            @endif
            <div class="mt-3">
                <table id="table_product" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bank</th>
                            <th>Saldo Masuk</th>
                            <th>Saldo Keluar</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mutasi as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama_bank}}</td>
                            <td>{{$data->saldo_masuk}}</td>
                            <td>{{$data->saldo_keluar}}</td>
                            <td>{{$data->tanggal}}</td>
                            <td>{{$data->keterangan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Top Up Saldo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/tambahsaldo">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jumlah Top Up</label>
                                    <input type="number" name="saldo_baru" class="form-control" id="exampleFormControlInput1" placeholder="Jumlah Top Up">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Metode</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="nama_bank">
                                        <option>BCA</option>
                                        <option>BNI</option>
                                        <option>BRI</option>
                                        <option>Mandiri</option>
                                        <option>Dana</option>
                                        <option>Gopay</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nomorakun">Masukan Nomer Akun</label>
                                    <input type="text" class="form-control" id="nomorakun" placeholder="Nomor Akun">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="text" hidden name="id_user" value="{{Auth::user()->id}}">
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="tarik" tabindex="-1" role="dialog" aria-labelledby="tarik" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tarik Saldo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/tariksaldo">
                                @csrf
                                <div class="form-group">
                                    <label for="tarik">Jumlah Tarik Saldo</label>
                                    <input type="number" name="tarik_saldo" class="form-control" id="tarik" placeholder="Jumlah Tarik Saldo">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Metode</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="nama_bank">
                                        <option>BCA</option>
                                        <option>BNI</option>
                                        <option>BRI</option>
                                        <option>Mandiri</option>
                                        <option>Dana</option>
                                        <option>Gopay</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nomorakun">Masukan Nomer Akun</label>
                                    <input type="text" class="form-control" id="nomorakun" placeholder="Nomor Akun">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="text" hidden name="id_user" value="{{Auth::user()->id}}">
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop