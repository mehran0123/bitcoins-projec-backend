<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'user_role' => 1,
            'password' => Hash::make('112233'),
            'real_password' => '112233',
        ]);
        DB::table('users')->insert([
            'first_name' => 'mehran',
            'last_name' => 'shiraz',
            'email' => 'mehran@gmail.com',
            'user_role' => 2,
            'left_code' => 222222,
            'right_code' => 111112,
            'password' => Hash::make('112233'),
            'real_password' => '112233',
        ]);
   }
}
