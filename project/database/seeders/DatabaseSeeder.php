<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'first_name' => 'Test',
             'last_name' => 'User',
             'email' => 'test@example.com',
             'password' => Hash::make('password'),
             'email_verified_at' => now(),
             'remember_token' => Str::random(10),
             'is_admin' => true
         ]);

         Shop::factory(10)->create();

         Shop::factory()->create([
             'name' => 'Test Shop',
             'description' => 'Test Description',
             'rating' => 5,
             'image' => 'https://via.placeholder.com/300',
             'type' => 'shop',

         ]);

        Category::factory(10)->create();

        Category::factory()->create([
            'name' => 'Test Category',
        ]);

         Product::factory(10)->create();

         Product::factory()->create([
             'name' => 'Test Product',
             'description' => 'Test Description',
             'price' => 1000,
             'weight' => 100,
             'shop_id' => 1,
             'image' => 'https://via.placeholder.com/300',
             'category_id' => 1
         ]);
    }
}
