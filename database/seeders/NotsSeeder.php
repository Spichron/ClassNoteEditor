<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ogrenci;
use App\Models\Not;

class NotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ogrenciler = Ogrenci::get();
        $ogrenciler -> each(function ($ogrenci){
            Not::factory() -> create(['ogrenci_no' => $ogrenci->no]);
        });
        
    }
}
