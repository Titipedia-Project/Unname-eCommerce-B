<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Auth;


class ProductsController extends Controller
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
        //
        $product = DB::table('products')
            ->join('users', function($join) {
                $join->on('products.id_user', '=', 'users.id')
                ->where('users.id', '=', Auth::user()->id);
            })
            ->join('kategoris', 'products.id_kategori', '=', 'kategoris.id')
            ->select('products.*', 'users.name', 'kategoris.nama_kategori')
            ->get();
        //jika ingin load per 10(sementara load all)
        /*if ($request->ajax()) {
            return datatables()->of($product)->make(true);
        }*/
        return view('pages.produk.product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategoris = DB::table('kategoris')->get();

        return view('pages.produk.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'nama_produk' => 'required',
            'stok' => 'required',
            'harga_jasa' => 'required',
            'harga_produk' => 'required',
            'berat' => 'required',
            'gambar' => 'required'
        ]);

        //get last id from product
        $product = DB::table('products')->orderBy('id', 'desc')->first();
        $id = $product->id;

        $str = "Hello world. It's a beautiful day.";
        print_r (explode(" ",$str));
        

        if ($request->hasFile('gambar')) {
            $identity = 0;
            foreach($request->file('gambar') as $image) {
                $filename = $image->getClientOriginalName();
                $extensionTemp = explode(".", $filename);
                $extension = $extensionTemp[count($extensionTemp) - 1]; 
                $image->move("produk_images/", strval($id+1) . "_produk" . strval($identity) . "." . $extension); //penamaan yg bukan array, penamaan array ada di registercontroller
                gambar::create([
                    'url' => strval($id+1) . "_produk" . strval($identity) . "." . $extension,
                    'id_produk' => $id+1
                ]);
                $identity++;
            }
        }
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
            'stok' => $request->stok,
            'harga_jasa' => $request->harga_jasa,
            'harga_produk' => $request->harga_produk,
            'berat' => $request->berat,
            'keterangan' => $request->keterangan,
            'id_user' => $request->id_user,
            'id_kategori' => $request->nama_kategori
        ]);

       
        //cara 3
        //Product::create($request->all());//all akan mengambil semua data fillable yang ada di model product
        return redirect('produk')->with('status', 'Data Berhasil Ditambahkan!');
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
        return view('pages.produk.edit', compact('product'));
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
        $request->validate([
            'nama_produk' => 'required',
            'jenis_produk' => 'required',
            'stok' => 'required',
            'harga_jasa' => 'required',
            'harga_produk' => 'required',
            'berat' => 'required',
            'gambar' => 'required'
        ]);
        $id = DB::table('products')->orderBy('id', 'desc')->first()->id + 1;
        $request->file('gambar')->move("produk_images/", strval($id) . "_produk.jpg"); //penamaan yg bukan array, penamaan array ada di registercontroller
        $filename = $id . '_produk.jpg';
        //
        Product::where('id', $product->id)
            ->update([
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
        return redirect('produk')->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, gambar $gambar)
    {
        //
        Product::destroy($product->id);
        gambar::destroy($gambar->id_produk);
        return redirect('produk')->with('status', 'Data Produk Berhasil Dihapus!');
    }
}
