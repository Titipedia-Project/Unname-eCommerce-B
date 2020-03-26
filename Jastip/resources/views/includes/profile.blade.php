<div class="card my-4 shadow-lg p-3 mb-5 bg-white rounded border-0">
  <div class="card-header bg-white mt-3">
    
    <div class="card bg-white border-0 text-left">
    <img width="140" height="140" src="{{ asset('photo_profile/'. Auth::user()->foto) }} " class="rounded-circle mx-auto" alt="...">
      <div class="card-body">
        <h3 class="text-center" class="card-title">{{Auth::user()->name}}</h3>
        <p class="card-text"><i class="	fas fa-user-circle"></i> {{Auth::user()->name}}</p>
        <p class="card-text"><i class="fas fa-phone"></i> {{Auth::user()->no_hp}}</p>
        <p class="card-text"><i class="fas fa-envelope"></i> {{Auth::user()->email}}</p>
        <p class="card-text"><i class="fas fa-home"></i> {{Auth::user()->alamat}}</p>
        <p class="card-text"><i class="fas fa-money-bill-alt"></i> Rp. {{Auth::user()->saldo}}</p>
        <p class="card-text"><i class="fas fa-star"></i> {{Auth::user()->rating}} rating</p>
        <a href="#" class="btn btn-success btn-sm btn-block active" data-toggle="modal" data-target="#exampleModal">Top Up Saldo</a>
        <a href="#" class="btn btn-primary btn-sm btn-block active">Edit Profile</a>
      </div>
    </div>
  </div>
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
        <form method="POST" action="/topup">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlInput1">Jumlah Top Up</label>
            <input type="text" name="saldo_baru" class="form-control" id="exampleFormControlInput1" placeholder="Jumlah Top Up">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Pilih Metode</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>Gopay</option>
              <option>Visa</option>
              <option>Mastercard</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Masukan Nomer Akun</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nomer Akun">
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
                <input type="text" hidden name="id_user" value="{{Auth::user()->id}}">
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>