<div class="card my-4">
  <div class="card-header bg-light">
    Category
  </div>
  
  @foreach($kategoris as $data)
  <a href="#" class="list-group-item border-0">{{$data->nama_kategori}}</a>
  @endforeach

</div>