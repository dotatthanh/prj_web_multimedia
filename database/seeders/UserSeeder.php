<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // Tạo admin
        User::truncate();
        User::create([
            'id' => 1,
            'code' => 'SUPER ADMIN',
        	'email' => 'ducthang.dt03@gmail.com',
        	'password' => bcrypt('123123123'),
        	'name' => 'Super Admin',
        	'birthday' => '1999-03-21',
        	'phone_number' => '0563047024',
        	'address' => 'Đại học kiến trúc Hà Nội',
        	'gender' => 'Nam',
        ]);
    }
}
