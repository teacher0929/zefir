<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')
            ->with('child')
            ->get();

        $objs = [];
        foreach ($categories as $category) {
            $grandChildren = Category::whereIn('parent_id', $category->child->pluck('id'))
                ->get();

            $objs[] = [
                'category' => collect($category)->forget('child'),
                'products' => Product::whereIn('category_id', $grandChildren->pluck('id'))
                    ->where('has_stock', 1)
                    ->where('has_discount', 1)
                    ->with('category', 'brand')
                    ->inRandomOrder()
                    ->take(6)
                    ->get(),
            ];
        }

        return view('client.home.index')
            ->with([
                'objs' => $objs,
            ]);
    }
}
