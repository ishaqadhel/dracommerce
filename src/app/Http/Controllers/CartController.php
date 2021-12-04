<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::where('id_user', Auth::user()->id)->first();

        if(!$cart) {
            return redirect()
                ->route('index')
                ->with('error', 'Cart masih kosong.');
        }

        return view('cart.index', compact('cart'));
    }

    public function addItem(Request $request, $id)
    {
        $request->validate([
            'quantity' => ['required'],
        ]);

        $product = Product::findOrFail($id);
        $cart = Cart::where('id_user', Auth::user()->id)->first();

        if (!$cart) {
            try {
                DB::beginTransaction();
    
                $cart = Cart::create([
                    'id_user' => Auth::user()->id,
                    'total' => 0
                ]);
                DB::commit();    
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error($e->getMessage());
                return redirect()
                        ->route('index')
                        ->with('error', 'Ada kesalahan dalam sistem pada saat membuat cart.');
            }
        }

        $productCard = ProductCart::where('id_product', $id)->where('id_cart', $cart->id)->first();

        if($productCard) {
            return redirect()
                ->route('index')
                ->with('error', 'Produk sudah berada di cart.');
        }

        try {
            DB::beginTransaction();

            ProductCart::create([
                'id_product' => $product->id,
                'id_cart' => $cart->id,
                'quantity' => $request->quantity,
            ]);

            $cart->update([
                'total' => $cart->total + ($request->quantity * $product->price)
            ]);

            DB::commit();    
            return redirect()
                ->route('cart.index')
                ->with('success', 'Produk berhasil ditambahkan kedalam cart.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()
                    ->route('index')
                    ->with('error', 'Ada kesalahan dalam sistem pada saat menambahkan produk kedalam cart.');
        }
    }

    public function removeItem($id) {
        // TODO: bug 1st row delete
        Product::findOrFail($id);
        $cart = Cart::where('id_user', Auth::user()->id)->first();

        if (!$cart) {
            return redirect()
                ->route('index')
                ->with('error', 'Cart masih kosong.');
        }

        $productCard = ProductCart::where('id_product', $id)->where('id_cart', $cart->id)->first();

        if (!$productCard) {
            return redirect()
                ->route('index')
                ->with('error', 'Produk tidak ada didalam cart.');
        }
        try {
            DB::beginTransaction();

            $productCard->delete();

            $cart->update([
                'total' => $cart->total - ($productCard->quantity * $productCard->product->price)
            ]);

            DB::commit();    
            return redirect()
                ->route('cart.index')
                ->with('success', 'Produk berhasil dihapus dari cart.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()
                    ->route('index')
                    ->with('error', 'Ada kesalahan dalam sistem pada saat menghapus produk dari cart.');
        }
    }
}