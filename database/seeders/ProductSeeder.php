<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Let's create 20 sample products
        $products = [
            // Makanan Ringan (Category ID 1)
            ['name' => 'Keripik Singkong Balado', 'price' => 15000, 'stock' => 50, 'category_id' => 1],
            ['name' => 'Basreng Pedas Daun Jeruk', 'price' => 18000, 'stock' => 40, 'category_id' => 1],
            ['name' => 'Makaroni Spiral Keju', 'price' => 12000, 'stock' => 60, 'category_id' => 1],
            ['name' => 'Kacang Bawang Gurih', 'price' => 20000, 'stock' => 30, 'category_id' => 1],
            ['name' => 'Seblak Kering Instan', 'price' => 22000, 'stock' => 25, 'category_id' => 1],

            // Minuman Dingin (Category ID 2)
            ['name' => 'Es Kopi Susu Gula Aren', 'price' => 18000, 'stock' => 100, 'category_id' => 2],
            ['name' => 'Thai Tea Original', 'price' => 15000, 'stock' => 120, 'category_id' => 2],
            ['name' => 'Jus Mangga Segar', 'price' => 20000, 'stock' => 80, 'category_id' => 2],
            ['name' => 'Lemon Tea Madu', 'price' => 16000, 'stock' => 90, 'category_id' => 2],
            ['name' => 'Es Cincau Hijau', 'price' => 12000, 'stock' => 70, 'category_id' => 2],

            // Kebutuhan Pokok (Category ID 3)
            ['name' => 'Beras Organik 5kg', 'price' => 75000, 'stock' => 20, 'category_id' => 3],
            ['name' => 'Minyak Goreng Kelapa 1L', 'price' => 25000, 'stock' => 50, 'category_id' => 3],
            ['name' => 'Gula Pasir Tebu 1kg', 'price' => 18000, 'stock' => 100, 'category_id' => 3],
            ['name' => 'Telur Ayam Kampung (isi 10)', 'price' => 30000, 'stock' => 40, 'category_id' => 3],
            ['name' => 'Kecap Manis Botol', 'price' => 15000, 'stock' => 80, 'category_id' => 3],

            // Kerajinan Tangan (Category ID 4)
            ['name' => 'Tas Rajut Tangan', 'price' => 150000, 'stock' => 15, 'category_id' => 4],
            ['name' => 'Gantungan Kunci Kayu Ukir', 'price' => 25000, 'stock' => 100, 'category_id' => 4],
            ['name' => 'Topeng Batik Hiasan Dinding', 'price' => 85000, 'stock' => 20, 'category_id' => 4],
            ['name' => 'Lilin Aroma Terapi Lavender', 'price' => 45000, 'stock' => 50, 'category_id' => 4],
            ['name' => 'Dompet Kulit Asli Jahit Tangan', 'price' => 250000, 'stock' => 10, 'category_id' => 4],
        ];

        // Loop through the array and create a record for each product
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
