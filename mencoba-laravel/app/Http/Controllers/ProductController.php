<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Managemen Produk || PPKD Sticker";
        $products = Product::with('category')->get();
        // $category = Category::with('products')->count();
        return view ('admin.product.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Produk || PPKD Stiker";
        $categories = Category::all();
        return view('admin.product.create', compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
            'name' => 'required|string|max:60',
            'stock' => 'required|integer',
            'price' => 'required|integer',
        ]);

        $imagePath = null;
        if($request->image){
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'category_id' => $request->category_id,
            'image'=>$imagePath,
            'name'=>$request->name,
            'stock'=>$request->stock,
            'price'=>$request->price,
        ]);
        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
