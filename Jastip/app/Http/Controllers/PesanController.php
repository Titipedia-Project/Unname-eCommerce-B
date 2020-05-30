<?php

namespace App\Http\Controllers;

use App\Pesan;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function chat()
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
