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
                    @csrf
                    <div class="card border-0">
                        <img src="{{asset('produk_images/'.$product->gambar)}}" class="mt-4 card-img-top" alt="...">
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
                            <li class="list-group-item" id="harga_jasa" value="{{$product->harga_jasa}}"><small class="text-muted">Harga jasa:
                                </small>Rp.{{$product->harga_jasa}}</li>
                            <li class="list-group-item"><small class="text-muted">Jenis produk:
                                </small>{{$product->jenis_produk}}</li>
                            <li class="list-group-item"><small class="text-muted">Stok: </small>{{$product->stok}}</li>
                            <li class="list-group-item"><small class="text-muted">Berat: </small>{{$product->berat}} Kg
                            </li>
                          
                            <li class="list-group-item" id="asal" value="{{$product->asal_pengiriman}}"><small
                                class="text-muted">Asal Pengiriman:
                            </small>Rp.{{$product->asal_pengiriman}}</li>
                        </ul>

                        <div class="card-body">
                            <form>
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
                                        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
                                          echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'> ".$data['rajaongkir']['results'][$i]['city_name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tipe Pengiriman</label>
                                    <select class="form-control" id="tipeService" name="tipeService" required>

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label >Total</label>
                                    <div class="form-control" id="totalHarga">

                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <a href="#" class="btn btn-success d-block">Beli</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
    var harga_produk = $('#harga_produk').val();
    var asal = $('#asal').val();
    localStorage.setItem('harga', harga_produk);
    localStorage.setItem('hargaTerakhir', 0);

   $('#kab_id').on('change', function (e) {
      var name =  $('#kab_id').val();
      var name2 =  $('#asal').val();
      $.post("{{url('/order/get_price')}}", {
        'kab_id': name2,
        '_token': "{{csrf_token()}}"
      },
      function (data) {
        var obj = JSON.parse(data);
        //var harga = data[0].rajaongkir;
        $('#tipeService').html('');
        //alert(Object.keys(obj.rajaongkir.results[0].costs).length);
        var harga_default = obj.rajaongkir.results[0].costs[0].cost[0].value;
        for(var i =0; i< Object.keys(obj.rajaongkir.results[0].costs).length ; i++){
          $('#tipeService').append('<option value="' + obj.rajaongkir.results[0].costs[i].cost[0].value + ',' + obj.rajaongkir.results[0].costs[i].service +'">' + obj.rajaongkir.results[0].costs[i].service + ' - ' + obj.rajaongkir.results[0].costs[i].description.toLowerCase() + ' - Rp. ' + obj.rajaongkir.results[0].costs[i].cost[0].value+ '</option>');
        }
        localStorage.setItem('biayaOngkir', harga_default);
        var hargaSekarang = localStorage.getItem('harga');
        var hargaJadi = Number(hargaSekarang) + Number( obj.rajaongkir.results[0].costs[0].cost[0].value)

        localStorage.setItem('harga',hargaJadi);
        $('#totalHarga').html('');
        $('#totalHarga').append('<h3>Rp.'+localStorage.getItem('harga')+'</h3><input type="hidden" class="form-control" name="hargaTotalnya" id="totalHargaH3" value="'+localStorage.getItem('harga')+'">');   

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

      alert(hargaBaru);
      localStorage.setItem('harga',hargaBaru);
      $('#totalHarga').html('');
      $('#totalHarga').append('<h3>Rp.'+localStorage.getItem('harga')+'</h3><input type="hidden" class="form-control" name="hargaTotalnya" id="totalHargaH3" value="'+localStorage.getItem('harga')+'">');   

    });
    
    
  });
</script>
@stop