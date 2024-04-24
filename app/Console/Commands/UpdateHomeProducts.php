<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateHomeProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-home-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update home products for app';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('products')
            ->whereNotNull('home_category_id')
            ->update(['home_category_id' => null]);

        $grandParents = Category::whereNull('parent_id')
            ->with('grandChild')
            ->get();

        foreach ($grandParents as $grandParent) {
            Product::whereIn('category_id', $grandParent->grandChild->pluck('id'))
                ->where('has_stock', 1)
                ->where('has_discount', 1)
                ->inRandomOrder()
                ->take(6)
                ->update(['home_category_id' => $grandParent->id]);
        }

        return Command::SUCCESS;
    }
}
