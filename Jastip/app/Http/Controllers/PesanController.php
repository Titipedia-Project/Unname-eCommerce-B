<?php

namespace App\Http\Controllers;

use App\Pesan;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        return view('pages.message.pesan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Pesan::create([
            'id_pengirim' => Auth::user()->id,
            'id_penerima' => $request->id_penerima,
            'isi_pesan' => $request->isi_pesan,
            'waktu_kirim' => date("Y-m-d H:i:s"),
            'dibaca' => 'belum'
        ]);
        //return redirect()->route('pesan', [$request->id_penerima]);
        // return redirect()->action(
        //     'PesanController@roomchat',
        //     ['pesan' => $request->id_penerima]
        // );
        $url = route('pesan', ['pesan' => $request->id_penerima]);
        return redirect($url);
        //return redirect()->route('pesan', $request->id_penerima);
        // route::patch('pesan/{pesan}', function ($request) {
        //     return 'pesan' . $request->id_penerima;
        // });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesan $pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesan $pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesan $pesan)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function roomchat(Request $request)
    {
        //
        $pesan = DB::table('pesans')
            ->where('id_penerima', Auth::user()->id)
            ->orWhere('id_penerima', $request->id_user)
            ->where('id_pengirim', Auth::user()->id)
            ->orWhere('id_pengirim', $request->id_user)->get();

        $user1 = DB::table('users')
            ->where('id', Auth::user()->id)->get();
        $user2 = DB::table('users')
            ->where('id', $request->id_user)->get();
        //dd($user2);
        return view('pages.message.pesan', compact('pesan', 'user1', 'user2'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesan $pesan)
    {
        //
    }
}
