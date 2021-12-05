<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Info;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Info::create([
        	'description' => 'test'
        ]);
    }
}
