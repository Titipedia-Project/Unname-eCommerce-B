@extends('layouts.fullview')
@section('content')
<div class="container mt-5">
    <div class="card  shadow-lg p-3 mb-5 bg-white rounded border-0">
        <div class="card-header bg-white">
            <h3>Profile</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="mt-2"></div>
                    @csrf
                    <div class="card border-0">
                        <div class="col-3">
                            <div class="mt-5">
                                <img src="{{ asset('photo_profile/'.Auth::user()->foto)}}" class="rounded float-left" width="200" height="200" alt="Responsive image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-3 border-0">
                        <div class="card-body">
                            <h3 class="card-title">{{Auth::user()->name}}</h3>
                            <p class="card-subtitle mb-2 text-muted">{{Auth::user()->username}}</p>
                            <p class="card-text">{{Auth::user()->email}}</p>
                            <p class="card-text">{{Auth::user()->jenis_kelamin}}</p>
                            <p class="card-text">{{Auth::user()->tanggal_lahir}}</p>
                            <p class="card-text">{{Auth::user()->tempat_lahir}}</p>
                            <p class="card-text">{{Auth::user()->alamat}}</p>
                            <p class="card-text">{{Auth::user()->kota}}</p>
                            <p class="card-text">{{Auth::user()->no_hp}}</p>
                            <p class="card-text">{{Auth::user()->saldo}}</p>
                        </div>
                    </div>
                    <div class="form-group row pull-right d-inline p-2">
                        <div class="col-sm-10">
                            <a href="/home" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <div class="form-group row pull-right d-inline p-2">
                        <div class="col-sm-10">
                            <a href="/home" class="btn btn-primary" style="background-color: #65587f; border: hidden">Edit Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@stop