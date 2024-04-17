<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            ['name' => 'Color', 'values' => [
                'White', 'Grey', 'Black', 'Blue', 'Brown', 'Red', 'Khaki', 'Silver', 'Orange', 'Beige', 'Green', 'Yellow',
            ]],
            ['name' => 'Size', 'values' => [
                'XS', 'S', 'M', 'L', 'XL', '2XL', '3XL', '4XL', '5XL',
            ]],
        ];

        for ($i = 0; $i < count($objs); $i++) {
            $attribute = Attribute::create([
                'name' => $objs[$i]['name'],
                'sort_order' => $i + 1,
            ]);

            for ($j = 0; $j < count($objs[$i]['values']); $j++) {
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'name' => $objs[$i]['values'][$j],
                    'sort_order' => $j + 1,
                ]);
            }
        }
    }
}
