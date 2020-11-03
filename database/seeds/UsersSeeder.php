<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'kode_user' => 'U0001',
        	'username' => 'ayufrida',
            'password' => Hash::make('admin'),
            'nama_user' => 'Ayu Frida',
            'alamat' => 'Gianyar',
            'no_telp_user' => '081234567890',
            'email_user' => 'ayufrida@gmail.com',
            'status' => '1'
        ]);
    }
}
