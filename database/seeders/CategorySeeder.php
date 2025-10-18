<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some sample categories
        Category::create(['name' => 'Makanan Ringan']); // Snacks
        Category::create(['name' => 'Minuman Dingin']); // Cold Drinks
        Category::create(['name' => 'Kebutuhan Pokok']); // Staple Goods
        Category::create(['name' => 'Kerajinan Tangan']); // Handicrafts
    }
}
