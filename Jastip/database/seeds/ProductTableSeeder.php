<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
        foreach (range(0, 10) as $i) {
            DB::table('products')->insert([
                'nama' => $faker->productName,
                'stok' => 9,
                'harga_jasa' => 8000,
                'harga_produk' => 2000,
                'berat' => 0,
                'keterangan' => '',
                'id_user' => 1,
                'asal_pengiriman' => '',
                'id_kategori' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            DB::table('gambars')->insert([
               'id_produk' => $i,
               'url' => 'produk.jpg'
            ]);
        }
    }
}
