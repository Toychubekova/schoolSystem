<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('users')->insert([
        'name' => 'Администратор',
        'email' => 'admin@example.com',
        'password' => Hash::make('1234'),
        'role' => 'admin',
    ]);
}

}
