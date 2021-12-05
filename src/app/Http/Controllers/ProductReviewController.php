<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductReviewController extends Controller
{
    public function create($id)
    {
        $product = Product::findOrFail($id);
        return view('product.review.create', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_product' => ['required'],
            'rating' => ['required', 'integer'],
            'description' => ['required'],
        ]);

        $product = Product::findOrFail($request->id_product);

        $review = ProductReview::where('id_product', $product->id)->where('id_user', auth()->user()->id)->first();

        if($review) {
            return redirect()
                    ->route('index')
                    ->with('error', 'Sudah pernah membuat review.');
        }

        try {
            DB::beginTransaction();

            ProductReview::create([
                'id_product' => $product->id,
                'id_user' => auth()->user()->id,
                'rating' => $request->rating,
                'description' => $request->description,
            ]);

            DB::commit();
            return redirect()->route('product.show', ['id' => $product->id])->with('success', 'Review berhasil dibuat.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()
                    ->route('index')
                    ->with('error', 'Ada kesalahan dalam sistem pada saat membuat review.');
        }
    }

}