<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            adminsSeeder::class,
            brandsSeeder::class,
            cartsSeeder::class,
            categoriesSeeder::class,
            colorsSeeder::class,
            couponsSeeder::class,
            customersSeeder::class,
            homebannersSeeder::class,
            orders_detailsSeeder::class,
            orders_statusSeeder::class,
            ordersSeeder::class,
            product_attrsSeeder::class,
            product_imagesSeeder::class,
            productsSeeder::class,
            reviewSeeder::class,
            sizesSeeder::class,
            taxesSeeder::class,
        ]);
    }
}
