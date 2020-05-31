<div class="card my-4 shadow-lg p-3 mb-5 bg-white rounded border-0">
  <div class="card-header bg-light">
    Category
  </div>

  @foreach($queryuser as $data)
  <img class="direct-chat-img" src="{{ asset('photo_profile/'.$data->foto)}}" alt="Message User Image">
  <a href="/pesan/{{$data->id}}" class="list-group-item border-0">{{$data->name}}</a>
  @endforeach

</div>