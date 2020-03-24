<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');
        foreach(range(0,10) as $i){
    		DB::table('users')->insert([
    			'name' => $faker->name,
    			'email' => $faker->email,
    			'username' => $faker->userName,
    			'password' => Hash::make('1'),
    			'jenis_kelamin' => 'laki-laki',
                'tanggal_lahir' => '1997-10-12',
                'tempat_lahir' => $faker->city,
                'foto' => '2_photo.jpg',
                'no_hp' => $faker->phoneNumber,
                'alamat' => $faker->address,
    			]);
        }
    }
}
