<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Hashim Alhadad',
            'username' => 'hashim',
            'email' => 'hashimalhadad@gmail.com',
            'password' => \Hash::make(123456),
            'type' => 'user'
        ]);

        User::create([
            'name' => 'Ibrahim Abdul',
            'username' => 'ibrahim',
            'email' => 'ibrahimabdul@gmail.com',
            'password' => \Hash::make(123456),
            'type' => 'admin'
        ]);

        User::create([
            'name' => 'Hasibur Rahman Omi',
            'username' => 'hasibomi',
            'email' => 'hrahmanomi@gmail.com',
            'password' => \Hash::make(123456),
            'type' => 'admin'
        ]);

        User::create([
            'name' => 'Sakibur Rahman Ovi',
            'username' => 'sakibovi',
            'email' => 'ovitherock@gmail.com',
            'password' => \Hash::make(123456),
            'type' => 'user'
        ]);
    }
}
