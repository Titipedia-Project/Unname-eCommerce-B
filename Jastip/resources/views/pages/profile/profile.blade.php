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
                    @csrf
                    <div class="card border-0">
                        <img src="{{asset('produk_images/'.Auth::user()->foto)}}" class="mt-4 card-img-top" alt="...">
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-5 border-0">
                        <div class="card-body">
                            <h3 class="card-title">{{Auth::user()->name}}</h3>
                            <p class="card-subtitle mb-2 text-muted">{{Auth::user()->username}}</p>
                            <p class="card-text">{{Auth::user()->email}}</p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@stop