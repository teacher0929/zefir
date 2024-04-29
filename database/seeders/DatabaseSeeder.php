<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
            ]);
        User::factory()
            ->count(10)
            ->create();

        $this->call([
            GenderSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            AttributeValueSeeder::class,
            ProductVariantSeeder::class,
        ]);
    }
}
