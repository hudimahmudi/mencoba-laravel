<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
       $validated=$request->validate([
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
            'name' => 'nullable|string|max:60',
            'slug' => 'nullable|string|unique:products,slug',
            'price' => 'nullable|integer|min:0',
            'price_art_cartoon' => 'nullable|integer|min:0',
            'price_art_paper' => 'nullable|integer|min:0',
            'price_art_hvs' => 'nullable|integer|min:0',
            'price_doft' => 'nullable|integer|min:0',
            'price_glossy' => 'nullable|integer|min:0',
            'cutting_price' => 'nullable|integer|min:0',
            'brief_description' =>'nullable|string',
            'description' => 'nullable|string',

            //validasi product image
            'images' => 'nullable|array',
            'images.*' => 'images|mimes:png,jpg,jpeg,webp|max:2048',
            'alt' =>'nullable|array',
            'alt.*' =>'nullable|string|max:255',
            'sort_order' => 'nullable|integer',

        ]);

        //product, product images
        DB::transaction(function() use($request, $validated){
            $product = Product::create([
                'category_id' =>$validated['category_id'],
                'name' => $validated['name'],
            ]);
            if($request->hasFile('images')){
                $imageData= [];
                foreach ($request->file('images') as $key => $file) {
                    $path =$file->store('products', 'public');

                    $imageData[] =[
                        'path' => $path,
                        'alt' => $request->input('alt.{$key}') ?? $product->name,
                        'sort_order' => $key + 1,
                    ];
                }
                $product->images()->createMany($imageData);
            }
        });

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan');

        // $imagePath = null;
        // if($request->image){
        //     $imagePath = $request->file('image')->store('products', 'public');
        // }

        // Product::create([
        //     'category_id' => $request->category_id,
        //     'image'=>$imagePath,
        //     'name'=>$request->name,
        //     'slug'=>$request->slug,
        //     'price'=>$request->price,
        // ]);
        // return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan');
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
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            "category_id" => "required|exists:categories,id",
            "image"=> "nullable|image|mimes:png,jpg,jpeg,gif|max:2048",
            "name" => "required|string|max:255",
            "slug"=> "nullable|string|unique:products,slug," . $product->id,
            "price"=> "nullable|integer|min:0",
            "price_art_cartoon"=> "nullable|integer|min:0",
            "price_art_paper"=> "nullable|integer|min:0",
            "price_hvs"=> "nullable|integer|min:0",
            "price_doft"=> "nullable|integer|min:0",
            "price_glossy"=> "nullable|integer|min:0",
            "price_cutting"=> "nullable|integer|min:0",
            "short_description"=> "nullable|string",
            "description"=> "nullable|string",
        ]);

        $validated["slug"] = $validated["slug"] ? Str::slug($validated["slug"]) : Str::slug($validated["name"]);
        $validated['image'] = $request->file('image')->store('products', 'public');

        
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);


        return redirect()->route("admin.product.index")->with("success","Product has been updated!");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
