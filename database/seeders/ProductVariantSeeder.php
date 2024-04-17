<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 500; $i++) {
            $category = Category::inRandomOrder()->first();
            $brand = Brand::inRandomOrder()->first();
            $groupId = str()->random(10);
            $groupName = fake()->unique()->streetName();
            $price = fake()->numberBetween(111, 999);

            for ($j = 0; $j < rand(3, 5); $j++) {
                $color = AttributeValue::where('attribute_id', 1)->inRandomOrder()->first();
                $productId = $groupId . '-' . str($color->name)->slug();
                $productName = $color->name . ' ' . $groupName;
                $hasDiscount = fake()->boolean(20);

                $product = Product::create([
                    'gender_id' => $category->gender_id,
                    'category_id' => $category->id,
                    'brand_id' => $brand->id,
                    'color_id' => $color->id,
                    'product_id' => $productId,
                    'group_id' => $groupId,
                    'name' => $productName,
                    'description' => fake()->paragraph(rand(1, 3)),
                    'discounted_price' => $hasDiscount ? $price - fake()->numberBetween(1, 99) : $price,
                    'selling_price' => $price,
                    'has_discount' => $hasDiscount,
                    'has_stock' => 1,
                    'viewed' => fake()->numberBetween(1, 999),
                    'random' => fake()->numberBetween(1, 9999),
                ]);

                for ($k = 0; $k < rand(3, 5); $k++) {
                    $size = AttributeValue::where('attribute_id', 2)->inRandomOrder()->first();
                    $variantId = $productId . '-' . str($size->name)->slug();

                    Variant::create([
                        'product_id' => $product->id,
                        'size_id' => $size->id,
                        'variant_id' => $variantId,
                        'discounted_price' => $product->discounted_price,
                        'selling_price' => $product->selling_price,
                        'has_discount' => $product->has_discount,
                        'stock' => rand(0, 3),
                    ]);
                }
            }
        }
    }
}
