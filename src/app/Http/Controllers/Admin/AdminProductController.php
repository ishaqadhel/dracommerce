<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Create a newly created resource in storage.
     */
    public function create()
    {
        $categories = ProductCategory::get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Edit one of the resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::get();
        return view('admin.product.edit', compact(['categories', 'product']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'id_category' => ['required'],
            'stock' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $location = public_path('/images');
            $file->move($location, $filename);

            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'id_product_category' => $request->id_category,
                'stock' => $request->stock,
                'price' => $request->price,
                'image' => $filename
            ]);

            DB::commit();
            return redirect()->route('admin.product.index')->with('success', 'Produk berhasil dibuat.');

        } catch (\Exception $e) {
            DB::rollBack();
            Storage::delete($filename);
            Log::error($e->getMessage());
            return redirect()
                    ->route('admin.product.index')
                    ->with('error', 'Ada kesalahan dalam sistem pada saat membuat produk.');
        }
    }

      /**
     * Update an old created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'id_category' => ['required'],
            'stock' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $product = Product::findOrFail($id);

        try {
            DB::beginTransaction();

            if($request->image)
            {
                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $location = public_path('/images');
                $file->move($location, $filename);
            }
            else 
            {
                $filename = $product->image;
            }

            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'id_product_category' => $request->id_category,
                'stock' => $request->stock,
                'price' => $request->price,
                'image' => $filename
            ]);

            DB::commit();
            // return redirect()->route('admin.product.index')->with('success', 'Produk berhasil disunting.');
            return redirect()->route('admin.product.edit', ['id' => $product->id])->with('success', 'Product berhasil di perbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            Storage::delete($filename);
            Log::error($e->getMessage());
            return redirect()
                    ->route('admin.product.index')
                    ->with('error', 'Ada kesalahan dalam sistem pada saat memperbarui produk.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Product::destroy($id);
            DB::commit();
            return redirect()
                    ->route('admin.product.index')
                    ->with('success', 'Berhasil menghapus produk.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()
                    ->route('admin.product.index')
                    ->with('error', 'Ada kesalahan dalam sistem pada saat menghapus produk.');
        }
    }
}