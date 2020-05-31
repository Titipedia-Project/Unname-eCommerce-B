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
        $queryuser = DB::table('users')
            ->join('pesans', function ($join) {
                $join->on('users.id', '=', 'pesans.id_penerima')
                    ->where('pesans.id_pengirim', Auth::user()->id)
                    ->orWhere('pesans.id_pengirim', 'user.id')
                    // ->where(function ($query) {
                    //     $query->where('id_penerima', Auth::user()->id);
                    // })
                    ->where('pesans.id_penerima', Auth::user()->id);
            })
            ->select('users.*', DB::raw('max(waktu_kirim) as waktu_kirim'))
            ->groupBy('users.id')
            ->orderBy('waktu_kirim', 'desc')->get();
        $cek = 'user';
        return view('pages.message.pesanClone', compact('queryuser', 'cek'));
        //dd($queryuser);
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
        Pesan::create([
            'id_pengirim' => Auth::user()->id,
            'id_penerima' => $request->id_penerima,
            'isi_pesan' => $request->isi_pesan,
            'waktu_kirim' => date("Y-m-d H:i:s"),
            'dibaca' => 'belum'
        ]);
        return redirect()->back();
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
        $id = $request->pesan;
        Pesan::where('id', $id)
            ->update([
                'dibaca' => 'sudah'
            ]);
        $pesan = DB::table('pesans')
            // ->where('id_penerima', Auth::user()->id)
            // ->orWhere('id_penerima', $request->pesan)
            // ->where('id_pengirim', Auth::user()->id)
            // ->orWhere('id_pengirim', $request->pesan)
            // ->orderBy('id', 'asc')->get();
            ->where('id_penerima', Auth::user()->id)
            ->orWhere('id_penerima', $request->pesan)
            ->where(function ($query) use ($request) {
                $query->where('id_pengirim', Auth::user()->id)
                    ->orWhere('id_pengirim', $request->pesan);
            })
            ->orderBy('id', 'asc')->get();

        $user1 = DB::table('users')
            ->where('id', Auth::user()->id)->get();
        $user2 = DB::table('users')
            ->where('id', $request->pesan)->get();
        //dd($pesan);
        $queryuser = DB::table('users')
            ->join('pesans', function ($join) {
                $join->on('users.id', '=', 'pesans.id_penerima')
                    ->where('pesans.id_pengirim', Auth::user()->id)
                    ->orWhere('pesans.id_pengirim', 'user.id')
                    // ->where(function ($query) {
                    //     $query->where('id_penerima', Auth::user()->id);
                    // })
                    ->where('pesans.id_penerima', Auth::user()->id);
            })
            ->select('users.*', DB::raw('max(waktu_kirim) as waktu_kirim'))
            ->groupBy('users.id')
            ->orderBy('waktu_kirim', 'desc')->get();
        $cek = 'room';
        return view('pages.message.pesan', compact('pesan', 'user1', 'user2', 'cek', 'queryuser'));
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
