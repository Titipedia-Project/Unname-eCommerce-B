<?php

namespace App\Http\Controllers;

use App\Mutasi_Saldo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Carbon\Carbon;
use Auth;

class Mutasi_SaldosController extends Controller
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
        $mutasi = DB::table('mutasi_saldos')
            ->join('users', function ($join) {
                $join->on('mutasi_saldos.user_id', '=', 'users.id')
                    ->where('users.id', '=', Auth::user()->id);
            })->get();
        //dd($mutasi);
        //jika ingin load per 10(sementara load all)
        /*if ($request->ajax()) {
            return datatables()->of($product)->make(true);
        }*/
        return view('pages.topup', compact('mutasi'));
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
        Mutasi_Saldo::create([
            'nama_bank' => $request->nama_bank,
            'saldo_masuk' => $request->saldo_baru,
            'keterangan' => $request->keterangan,
            'tanggal' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_id' => $request->id_user
        ]);
        $user = User::find($request->id_user);
        $saldo = $user->saldo;
        $saldo_baru = $saldo + $request->saldo_baru;
        User::where('id', $request->id_user)
            ->update([
                'saldo' => $saldo_baru
            ]);
        return redirect('topup')->with('status', 'Saldo Berhasil di Tambah!');
    }
    public function withdraw(Request $request)
    {
        //
        Mutasi_Saldo::create([
            'nama_bank' => $request->nama_bank,
            'saldo_keluar' => $request->tarik_saldo,
            'keterangan' => $request->keterangan,
            'tanggal' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_id' => $request->id_user
        ]);
        $user = User::find($request->id_user);
        $saldo = $user->saldo;
        $tarik_saldo = $saldo - $request->tarik_saldo;
        if ($saldo < $tarik_saldo) {
            return redirect('topup')->with('status', 'Jumlah Yang Anda Ambil Melebihi Limit Saldo Anda!');
        } else {
            User::where('id', $request->id_user)
                ->update([
                    'saldo' => $tarik_saldo
                ]);
            return redirect('topup')->with('status', 'Saldo Berhasil Diambil!');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Mutasi_Saldo  $mutasi_Saldo
     * @return \Illuminate\Http\Response
     */
    public function show(Mutasi_Saldo $mutasi_Saldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mutasi_Saldo  $mutasi_Saldo
     * @return \Illuminate\Http\Response
     */
    public function edit(Mutasi_Saldo $mutasi_Saldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mutasi_Saldo  $mutasi_Saldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mutasi_Saldo $mutasi_Saldo)
    {
        //
        // Mutasi_Saldo::where('user_id', $request->id_user)
        //     ->update([
        //         'nama_bank' => $request->nama_bank,
        //         'saldo_keluar' => $request->tarik_saldo,
        //         'keterangan' => $request->keterangan,
        //         'tanggal' => Carbon::now()->format('Y-m-d H:i:s'),
        //         'user_id' => $request->id_user
        //     ]);
        // $user = User::find($request->id_user);
        // $saldo = $user->saldo;
        // $saldo_baru = $saldo - $request->tarik_saldo;
        // if ($saldo < $saldo_baru) {
        //     return redirect('topup')->with('status', 'Jumlah Yang Anda Ambil Melebihi Limit Saldo Anda!');
        // } else {
        //     User::where('id', $request->id_user)
        //         ->update([
        //             'saldo' => $saldo_baru
        //         ]);
        //     return redirect('topup')->with('status', 'Saldo Berhasil Diambil!');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mutasi_Saldo  $mutasi_Saldo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mutasi_Saldo $mutasi_Saldo)
    {
        //
    }
}
