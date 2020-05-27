<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Food and Drinks',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'logo_kategori' => 'kategori.jpg',
            'id_admin' => '1'
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Gadgets',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'logo_kategori' => 'kategori.jpg',
            'id_admin' => '1'
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Clothes',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'logo_kategori' => 'kategori.jpg',
            'id_admin' => '1'
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Skincares',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'logo_kategori' => 'kategori.jpg',
            'id_admin' => '1'
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Sports',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'logo_kategori' => 'kategori.jpg',
            'id_admin' => '1'
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Games',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'logo_kategori' => 'kategori.jpg',
            'id_admin' => '1'
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Collectibles',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'logo_kategori' => 'kategori.jpg',
            'id_admin' => '1'
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Others',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'logo_kategori' => 'kategori.jpg',
            'id_admin' => '1'
        ]);
    }
}
