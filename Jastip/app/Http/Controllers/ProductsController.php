<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $product = Product::all();
        //jika ingin load per 10(sementara load all)
        /*if ($request->ajax()) {
            return datatables()->of($product)->make(true);
        }*/
        return view('pages.produk.product', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('products')->orderBy('id', 'desc')->first()->id + 1;
        $request->file('gambar')->move("produk_images/", strval($id) . "_produk.jpg"); //penamaan yg bukan array, penamaan array ada di registercontroller
        $filename = $id . '_produk.jpg';
        //cara 1
        // $product = new Product;
        // $product->nama = $request->nama_produk;
        // $product->jenis_produk = $request->jenis_produk;
        // $product->stok = $request->stok;
        // $product->harga_jasa = $request->harga_jasa;
        // $product->harga_produk = $request->harga_produk;
        // $product->berat = $request->berat;
        // $product->keterangan = $request->keterangan;
        // $product->gambar = $request->gambar;
        // $product->save();

        //cara 2
        Product::create([
            'nama' => $request->nama_produk,
            'jenis_produk' => $request->jenis_produk,
            'stok' => $request->stok,
            'harga_jasa' => $request->harga_jasa,
            'harga_produk' => $request->harga_produk,
            'berat' => $request->berat,
            'keterangan' => $request->keterangan,
            'id_user' => $request->id_user,
            'gambar' => $filename

        ]);
        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('pages.produk.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
