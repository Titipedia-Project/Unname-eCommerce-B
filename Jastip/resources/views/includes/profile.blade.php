<div class="card my-4">
  <div class="card-header bg-light">
    
    <div class="card bg-light border-0">
    <img class="circle img-thumbnail" src="{{ asset('photo_profile/'. Auth::user()->foto) }} " class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{Auth::user()->name}}</h5>
        <p class="card-text">{{Auth::user()->no_hp}}</p>
        <p class="card-text">{{Auth::user()->alamat}}</p>
        <p class="card-text">{{Auth::user()->saldo}}</p>
        <p class="card-text">{{Auth::user()->rating}}</p>
        <a href="#" class="btn btn-primary">Edit</a>
      </div>
    </div>
  </div>
  
  
</div>