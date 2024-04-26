<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('name')
            ->get();

        return view('client.brands.index')
            ->with([
                'brands' => $brands,
            ]);
    }
}
