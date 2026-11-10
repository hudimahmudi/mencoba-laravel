<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function category(string $slug)
    {
        $category = Category::with('products')->where('slug', $slug)->first();
        $products = $category->products()->paginate(10);

        return view('category.index', compact('products', 'category'));
    }

    public function listing()
    {
        $products = Product::with('category')->get();
        return view('product.index', compact('products'));
    }

    public function product(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('product.index', compact('product'));
    }
}
