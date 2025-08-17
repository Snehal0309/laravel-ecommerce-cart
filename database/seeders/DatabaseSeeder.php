<?php

namespace Database\Seeders;

use App\Models\{User,product,ProductImage};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   public function run(): void {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin','password' => bcrypt('password')]
        );

        foreach ([
            ['name' => 'T-Shirt', 'price' => 499.00],
            ['name' => 'Coffee Mug', 'price' => 299.00],
            ['name' => 'Notebook', 'price' => 199.00],
        ] as $p) {
            $product = Product::create([
                'name' => $p['name'],
                'slug' => Str::slug($p['name']).'-'.Str::random(6),
                'description' => 'Sample description for '.$p['name'],
                'price' => $p['price'],
            ]);

            ProductImage::create([
                'product_id' => $product->id,
                'path' => 'products/sample.png',
                'sort_order' => 0
            ]);
        }
    }
}
