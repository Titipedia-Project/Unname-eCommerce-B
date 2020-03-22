@extends('layouts.default')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block img-fluid" src="{{asset('images/image_1.svg')}}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="{{asset('images/image_2.svg')}}" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="{{asset('images/image_3.svg')}}" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<h3>Produk Terbaru</h3>
<div class="row">
    
    @foreach($produks as $data)
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
            <a href="#"><img class="card-img-top" src="produk_images/{{$data->gambar}}" alt=""></a>
            <div class="card-body">

                <small class="font-weight-bold" style="color: #65587f;">{{$data->nama}}</small>

            </div>
            <div class="card-footer bg-white">
                <h6>Rp. {{$data->harga_produk}}</h6>
                <div class="row">
                    <div class="col">
                        <small class="text-muted">stok {{$data->stok}}</small>
                    </div>
                    <div class="col">
                        <div class="text-right">
                            <small href="#" style="background-color: #65587f; border: hidden" class="btn btn-primary">Order</small>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endforeach


</div>
@stop