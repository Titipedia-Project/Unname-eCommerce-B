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
        return view('pages.req.createreq');
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
            'nama' => 'required',
            'jumlah' => 'required',
            'kota' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
        ]);
        //penamaan gambar/foto
        $id = DB::table('reqs')->orderBy('id', 'desc')->first()->id + 1;
        $request->file('gambar')->move("request_images/", strval($id) . "_request.jpg"); //penamaan yg bukan array, penamaan array ada di registercontroller
        $filename = $id . '_request.jpg';

        //
        Req::create([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'kota_tujuan' => $request->kota,
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
    }
}
