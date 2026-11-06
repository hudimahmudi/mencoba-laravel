<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Managemen Produk || PPKD Sticker';
        $products = Product::with('category', 'images')->get();
        // $category = Category::with('products')->count();

        return view('admin.product.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Product || PPKD Sricker';
        $categories = Category::get();

        return view('admin.product.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:60',
            'slug' => 'nullable|string|max:60|unique:products,slug',
            'price' => 'required|numeric',
            'brief_description' => 'nullable|string',
            'description' => 'nullable|string',
            'price_art_cartoon' => 'nullable|numeric',
            'price_art_paper' => 'nullable|numeric',
            'price_art_hvs' => 'nullable|numeric',
            'price_doft' => 'nullable|numeric',
            'price_glossy' => 'nullable|numeric',
            'cutting_price' => 'nullable|numeric',

            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'alt' => 'nullable|array',
            'alt.*' => 'nullable|string|max:255',
        ]);

        // dd($request->images);

        //buat nambah gambar+produk barisan 64-88#byZidan // kalau dari pak tri di barisan 86-108 di vc nya
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        try {
            DB::beginTransaction();

            $arrImage = [];
            $image= null;

              $product = Product::create([
                'category_id' => $validated['category_id'],
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'image' => null,
                'price_art_paper' => $validated['price_art_paper'],
                'description' => $validated['description'],
                'brief_description' => $validated['brief_description'],
                'price_art_cartoon' => $validated['price_art_cartoon'],
                'price_art_hvs' => $validated['price_art_hvs'] ?? null,
                'price_doft' => $validated['price_doft'],
                'price_glossy' => $validated['price_glossy'],
                'cutting_price' => $validated['cutting_price'],
                'price' => $validated['price'],
            ]);

            if ($request->has('images') && is_array($request->images)) {
                if (count($request->images) > 0) {
                    foreach ($request->images as $key => $image) {
                        if ($request->hasFile('images.' . $key)) {
                            $path = $image->store('products', 'public');
                            if ($key === 0) {
                                $image = $path;
                            }

                            $arrImage[] = [
                                'path' => $path,
                                'alt' => 'Contoh alt ' . $key,
                                'sort_order' => $key
                            ];
                        }
                    }
                }
            }

          


            $product->images()->createMany($arrImage);
            if ($image) {
                $product->update([
                    'image' => $image
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }

        return redirect()->route('admin.product.index')->with('success', 'Product berhasil ditambahkan!');
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
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:60',
            'slug' => 'nullable|string|max:60|unique:products,slug,' . $product->id,
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
            'brief_description' => 'nullable|string',
            'description' => 'nullable|string',
            'price_art_cartoon' => 'nullable|numeric',
            'price_art_paper' => 'nullable|numeric',
            'price_hvs' => 'nullable|numeric',
            'price_doff' => 'nullable|numeric',
            'price_glossy' => 'nullable|numeric',
            'price_cutting' => 'nullable|numeric',
            'price_no_cutting' => 'nullable|numeric',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }
        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // Upload gambar baru
            $validated['image'] = $request->file('image')->store('products', 'public');
        }
        $product->update($validated);

        return redirect()->route('admin.product.index')->with('success', 'Product berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Product berhasil dihapus!');
    }
}