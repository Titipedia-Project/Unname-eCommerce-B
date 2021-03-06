<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategoris = DB::table('kategoris')->get();

        $produks = DB::table('products')
            ->join('users', 'users.id', '=', 'products.id_user')
            ->join('kategoris', 'products.id_kategori', '=', 'kategoris.id')
            ->join('gambars', 'products.id', '=', 'gambars.id_produk')->groupBy('products.id')
            ->select('products.*', 'users.name', 'gambars.url', 'kategoris.nama_kategori')
            ->latest()->take(8)->get();
        return view('pages.home', compact('produks', 'kategoris'));
    }
}
