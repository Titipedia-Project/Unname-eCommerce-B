@extends('layouts.fullview')
@section('content')
<div class="container mt-5">
    <div class="card  shadow-lg p-3 mb-5 bg-white rounded border-0">
        <div class="card-header bg-white">
            <h3>Order</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">


                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            @for($i = 0;$i < count($gambar); $i++) @if($i===0) <div class="carousel-item active">
                                <img src="{{asset('produk_images/'.$gambar[$i]->url)}}" class="d-block w-100" alt="...">
                        </div>
                        @else
                        <div class="carousel-item">
                            <img src="{{asset('produk_images/'.$gambar[$i]->url)}}" class="d-block w-100" alt="...">
                        </div>
                        @endif

                        @endfor



                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <a href="/pesan/{{$product->id_user}}" class="btn btn-success"
                            style="background-color: #65587f; border: hidden">Chat Penjual</a>
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="card mt-5 border-0">
                    <div class="card-body">
                        <h3 class="card-title">{{$product->nama}}</h3>
                        <p class="card-subtitle mb-2 text-muted">{{$kategori[0]->nama_kategori}}</p>
                        <p class="card-text">{{$product->keterangan}}</p>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item" id="harga_produk" value="{{$product->harga_produk}}"><small
                                class="text-muted">Harga produk:
                            </small>Rp.{{$product->harga_produk}}</li>
                        <li class="list-group-item" id="harga_jasa" value="{{$product->harga_jasa}}"><small
                                class="text-muted">Harga jasa:
                            </small>Rp.{{$product->harga_jasa}}</li>
                        <li class="list-group-item"><small class="text-muted">Jenis produk:
                            </small>{{$product->jenis_produk}}</li>
                        <li class="list-group-item"><small class="text-muted">Stok: </small>{{$product->stok}}</li>
                        <li class="list-group-item"><small class="text-muted">Berat: </small>{{$product->berat}} Kg
                        </li>

                        <li class="list-group-item" id="asal" value="{{$product->asal_pengiriman}}"><small
                                class="text-muted">Asal Pengiriman:

                        <li class="list-group-item" id="asal" value="{{$product->asal_pengiriman}}"><small
                                class="text-muted">Asal Pengiriman:

                            </small>Rp.{{$product->asal_pengiriman}}</li>
                    </ul>

                    <div class="card-body">
                        <form method="POST" action="/order/confirm">
                            @csrf
                            <input type="text" hidden class="form-control" id="id_produk" name="id_produk"
                                value="{{$product->id}}">
                            <input type="text" hidden class="form-control" id="id_pembeli" name="id_pembeli"
                                value="{{Auth::user()->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Pembelian</label>
                                <input type="number" class="form-control" id="stok_pembelian" name="stok_pembelian"
                                    value="1" min="1" max="{{$product->stok}}">

                                <input type="text" hidden class="form-control" id="id_produk" name="id_produk"
                                    value="{{$product->id}}">
                                <input type="text" hidden class="form-control" id="id_pembeli" name="id_pembeli"
                                    value="{{Auth::user()->id}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jumlah Pembelian</label>
                                    <input type="number" class="form-control" id="stok_pembelian" name="stok_pembelian"
                                        value="1" min="1" max="{{$product->stok}}">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Pembeli</label>
                                    <input type="text" class="form-control" id="nama" name="nama_pembeli"
                                        value="{{Auth::user()->name}}" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat Pengiriman</label>
                                    <input type="text" class="form-control" id="alamat_pengiriman"
                                        name="alamat_pengiriman" value="{{Auth::user()->alamat}}"
                                        aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kota Pengiriman</label>
                                    <select class="form-control" id="kab_id" name="kab_id">
                                        <?PHP
                                        $data = json_decode($response, true);
                                        for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
                                            if ($data['rajaongkir']['results'][$i]['city_name'] === "Jakarta Barat") {
                                                echo "<option selected value='" . $data['rajaongkir']['results'][$i]['city_id'] . "'> " . $data['rajaongkir']['results'][$i]['city_name'] . "</option>";
                                            }
                                            echo "<option value='" . $data['rajaongkir']['results'][$i]['city_id'] . "'> " . $data['rajaongkir']['results'][$i]['city_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <input type="text" hidden class="form-control" id="nama_kota" name="nama_kota">
                                </div>
                                <div class="form-group">
                                    <label>Tipe Pengiriman</label>
                                    <select class="form-control" id="tipeService" name="tipeService" required>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Total</label>
                                    <h2 id="totalHarga"></h2>

                                </div>
                                <button type="submit" class="btn btn-success d-block">Beli</button>
                        </form>
                    </div>
                    <div class="card-body">


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        var harga_produk = $('#harga_produk').val();
        var harga_jasa = $('#harga_jasa').val();
        var harga_total = harga_produk + harga_jasa;

        var asal = $('#asal').val();
        localStorage.setItem('harga', harga_total);
        localStorage.setItem('hargaTerakhir', 0);
        var nama_kota = $('#kab_id').find(":selected").text();
        $('#nama_kota').val(nama_kota);
        $('#kab_id').on('change', function(e) {
            var nama_kota = $('#kab_id').find(":selected").text();
            $('#nama_kota').val(nama_kota);

            var name = $('#kab_id').val();
            var name2 = "{{$product->asal_pengiriman}}";
            $.post("{{url('/order/get_price')}}", {
                    'kab_id': name,
                    'asal': "{{$product->asal_pengiriman}}",
                    '_token': "{{csrf_token()}}"
                },
                function(data) {
                    var obj = JSON.parse(data);
                    //var harga = data[0].rajaongkir;
                    $('#tipeService').html('');
                    //alert(Object.keys(obj.rajaongkir.results[0].costs).length);
                    var harga_default = obj.rajaongkir.results[0].costs[0].cost[0].value;
                    for (var i = 0; i < Object.keys(obj.rajaongkir.results[0].costs).length; i++) {
                        $('#tipeService').append('<option value="' + obj.rajaongkir.results[0].costs[i].cost[0].value + ',' + obj.rajaongkir.results[0].costs[i].service + '">' + obj.rajaongkir.results[0].costs[i].service + ' - ' + obj.rajaongkir.results[0].costs[i].description.toLowerCase() + ' - Rp. ' + obj.rajaongkir.results[0].costs[i].cost[0].value + '</option>');
                    }
                    localStorage.setItem('biayaOngkir', harga_default);
                    var hargaSekarang = localStorage.getItem('harga');
                    var hargaJadi = Number(hargaSekarang) + Number(obj.rajaongkir.results[0].costs[0].cost[0].value)

                    localStorage.setItem('harga', hargaJadi);
                    $('#totalHarga').html('');
                    $('#totalHarga').append('<h3>Rp.' + localStorage.getItem('harga') + '</h3><input type="hidden" class="form-control" name="hargaTotalnya" id="totalHargaH3" value="' + localStorage.getItem('harga') + '">');

                });



        });
        $('#tipeService').on('change', function(e) {
            var hargaOngkirLama = localStorage.getItem('biayaOngkir');
            var hargaSekarang = localStorage.getItem('harga');
            var hargaSementara = Number(hargaSekarang) - Number(hargaOngkirLama);
            var biayaOngkirBaru1 = $('#tipeService').val();
            alert(biayaOngkirBaru1);
            var biayaOngkirBaru = biayaOngkirBaru1.split(",")[0];
            localStorage.setItem('biayaOngkir', biayaOngkirBaru);

            var hargaBaru = Number(biayaOngkirBaru) + Number(hargaSementara);

            localStorage.setItem('harga', hargaBaru);
            $('#totalHarga').html('');
            $('#totalHarga').append('<h3>Rp.' + localStorage.getItem('harga') + '</h3><input type="hidden" class="form-control" name="hargaTotalnya" id="totalHargaH3" value="' + localStorage.getItem('harga') + '">');
        });
    });
</script>
@stop