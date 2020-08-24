<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
            'firstname' => 'Kirit',
            'lastname' => 'Gothi',
            'is_admin' => 1,
            'username' => 'kirit.gothi',
            'email' =>  'kirit.gothi@gmail.com',
            'password' => Hash::make('test@123'),
            'usersdetail_id' => 0
        ]);
    }
}
