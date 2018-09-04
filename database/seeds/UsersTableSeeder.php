<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'adress' => "24 route des mimosa, 42500 Genilac",
            'role_id' => 2,

        ]);
        DB::table('users')->insert([
            'username' => 'user',
            'password' => Hash::make('user'),
            'adress' => "1234 impasse de poules, 78200 Gex",
            'role_id' => 1,
        ]);
    }
}
