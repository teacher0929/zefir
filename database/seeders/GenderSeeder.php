<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            'Women',
            'Men',
            'Kids',
        ];

        foreach ($objs as $obj) {
            $gender = Gender::create([
                'name' => $obj,
                'slug' => str()->random(5),
            ]);
            $gender->slug = str($gender->name)->slug() . '-' . $gender->id;
            $gender->update();
        }
    }
}
