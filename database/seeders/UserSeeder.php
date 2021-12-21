<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();
        DB::table('users')->insert([
            'code' => 'SUPER ADMIN',
            'email' => 'ducthang.dt03@gmail.com',
            'password' => bcrypt('123123123'),
            'name' => 'Super Admin',
            'birthday' => '1999-03-21',
            'phone_number' => '0563047024',
            'address' => 'Đại học kiến trúc Hà Nội',
            'gender' => 'Nam',
        ]);
        // // Tạo admin
        // User::create([
        //     'id' => 1,
        //     'code' => 'SUPER ADMIN',
        // 	'email' => 'ducthang.dt03@gmail.com',
        // 	'password' => bcrypt('123123123'),
        // 	'name' => 'Super Admin',
        // 	'birthday' => '1999-03-21',
        // 	'phone_number' => '0563047024',
        // 	'address' => 'Đại học kiến trúc Hà Nội',
        // 	'gender' => 'Nam',
        // ]);
    }
}
