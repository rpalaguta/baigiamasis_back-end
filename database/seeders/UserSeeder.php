<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'password' => Hash::make('123456'),
            'role_id' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'user@email.com',
            'password' => Hash::make('123456'),
            'role_id' => '2',
        ]);

        User::factory()->times(10)->create();
    }
}
