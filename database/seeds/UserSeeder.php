<?php

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
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'admin@dummy.com',
                'phone' => '081234567891',
                'role' => 'Admin',
                'password' => Hash::make('password'),
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'User1',
                'email' => 'user1@dummy.com',
                'phone' => '081234567892',
                'role' => 'User',
                'password' => Hash::make('password'),
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'User2',
                'email' => 'user2@dummy.com',
                'phone' => '081234567893',
                'role' => 'User',
                'password' => Hash::make('password'),
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            ]
        );
    }
}
