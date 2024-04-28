<?php
// database/seeders/BrandSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run()
    {
        Brand::create(['name' => 'Merek A']);
        Brand::create(['name' => 'Merek B']);
        // Tambahkan entri merek lainnya sesuai kebutuhan
    }
}
