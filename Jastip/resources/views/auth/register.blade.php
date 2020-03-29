@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username"
                                class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Ulangi Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="place_of_birth"
                                class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="place_of_birth" type="text" class="form-control" name="place_of_birth"
                                    value="{{ old('place_of_birth') }}" required autocomplete="place_of_birth">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_of_birth"
                                class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                <input class="date form-control" id="date_of_birth" class="form-control"
                                    name="date_of_birth" type="text" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat"
                                class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat"
                                    value="{{ old('alamat') }}" required autocomplete="alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota_tempat_tinggal"
                                class="col-md-4 col-form-label text-md-right">{{ __('Kota tempat tinggal') }}</label>
                            <div class="col-md-6">
                               
                            <select class="form-control" id="kab_id" name="kota">
                                <?PHP
                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 30,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "GET",
                                    CURLOPT_HTTPHEADER => array(
                                        "key: 20abcef3dbf0bc2149a7412bc9b60005"
                                    ),
                                ));

                                $response = curl_exec($curl);
                                $err = curl_error($curl);

                                curl_close($curl);

                                if ($err) {
                                    echo "cURL Error #:" . $err;
                                } else {
                                    $data = json_decode($response, true);
                                    for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                                        echo "<option value='".$data['rajaongkir']['results'][$i]['city_name']."'> ".$data['rajaongkir']['results'][$i]['city_name']."</option>";
                                    }
                                }
                            ?>
                            </select>
                        </div>
                            <input type="text" hidden class="form-control" id="nama_kota" name="nama_kota">
                        </div>
                        <div class="form-group row">
                            <label for="no_hp"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nomer Telepon') }}</label>

                            <div class="col-md-6">
                                <input id="no_hp" type="text" class="form-control" name="no_hp"
                                    value="{{ old('no_hp') }}" required autocomplete="no_hp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                            <div class="col-md-6">
                                <select id="sex" name="sex" class="form-control">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="filePhoto" class="col-sm-4 col-form-label text-right">Unggah foto</label>
                            <div class="col-sm-8" id="addBrowsePhoto">
                                <input type="file" id="photo_profile" name="photo_profile" class="validate"
                                    placeholder="optional" />
                                <img src="" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.date').datepicker({  
       format: 'yyyy-mm-dd'
     });  
</script>
@endsection