<?php

namespace App\Http\Controllers;

use App\Req;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ReqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengguna = Auth::user()->id;
        $req = DB::table('reqs')->where('id_user', '=', $pengguna)->get();

        return view('pages.req.request', compact('req'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return view('pages.req.createreq', compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validation
        $request->validate([
            'nama_req' => 'required',
            'jumlah_req' => 'required',
            'alamat_req' => 'required',
            'kota_req' => 'required',
            'status_req' => 'required',
            'gambar' => 'required',
        ]);
        //penamaan gambar/foto
        $id = DB::table('reqs')->orderBy('id', 'desc')->first()->id + 1;
        $request->file('gambar')->move("request_images/", strval($id) . "_request.jpg"); //penamaan yg bukan array, penamaan array ada di registercontroller
        $filename = $id . '_request.jpg';

        //
        Req::create([
            'nama_req' => $request->nama_req,
            'jumlah_req' => $request->jumlah_req,
            'alamat_req' => $request->alamat_req,
            'kota_req' => $request->kota_req,
            'status_req' => $request->status_req,
            'keterangan' => $request->keterangan,
            'id_user' => $request->id_user,
            'gambar' => $filename
        ]);
        return redirect('request')->with('status', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Req  $req
     * @return \Illuminate\Http\Response
     */
    public function show(Req $req)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Req  $req
     * @return \Illuminate\Http\Response
     */
    public function edit(Req $req)
    {
        //
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
        return view('pages.req.editreq', compact('req', 'response'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Req  $req
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Req $req)
    {
        //
        $request->validate([
            'nama_req' => 'required',
            'jumlah_req' => 'required',
            'alamat_req' => 'required',
            'kota_req' => 'required',
            'status_req' => 'required',
        ]);
        //penamaan gambar/foto
        $id = DB::table('reqs')->orderBy('id', 'desc')->first()->id + 1;
        $request->file('gambar')->move("request_images/", strval($id) . "_request.jpg"); //penamaan yg bukan array, penamaan array ada di registercontroller
        $filename = $id . '_request.jpg';

        //
        Req::where('id', $req->id)
            ->update([
                'nama_req' => $request->nama_req,
                'jumlah_req' => $request->jumlah_req,
                'alamat_req' => $request->alamat_req,
                'kota_req' => $request->kota_req,
                'status_req' => $request->status_req,
                'keterangan' => $request->keterangan,
                'id_user' => $request->id_user,
                'gambar' => $filename
            ]);
        return redirect('request')->with('status', 'Data Request Order Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Req  $req
     * @return \Illuminate\Http\Response
     */
    public function destroy(Req $req)
    {
        //
        Req::destroy($req->id);
        return redirect('request')->with('status', 'Data Request Order Berhasil Dihapus!');
    }
}
