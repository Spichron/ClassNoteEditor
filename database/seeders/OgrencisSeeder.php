<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ogrenci;

class OgrencisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ogrenci::factory()->count(24)->create();
    }
}
