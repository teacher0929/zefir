<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::inRandomOrder()
            ->take(12)
            ->get();

        $categories = Category::whereNull('parent_id')
            ->with(['homeProducts' => ['brand', 'category']])
            ->get();

        return view('client.home.index')
            ->with([
                'brands' => $brands,
                'categories' => $categories,
            ]);
    }
}
